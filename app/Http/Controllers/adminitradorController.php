<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;
use App\logs;
use App\prestamo;
use App\alumno;
use App\reservacion;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class adminitradorController extends Controller
{

    public function principal() {
        $libros = libro::all();
        $librosMasPrestados = prestamo::select('idLibro', DB::raw('count(idLibro) as cuenta'))->groupBy('idLibro')->orderBy( DB::raw('count(idLibro)'),'DESC')->take(10)->get();
        $rankingGrupo = DB::table('alumno')->select(DB::raw('count(alumno.grado) as librosPrestados'),'alumno.grado')->groupBy('alumno.grado')->join('prestamo', 'alumno.id', '=', 'prestamo.idUsuario')->get();
        $alumnosLectores = DB::table('alumno')->select(DB::raw('COUNT(alumno.nombre) AS librosPrestados'), 'alumno.nombre')->groupBy('alumno.nombre')->join('prestamo', 'alumno.id', '=', 'prestamo.idUsuario')->groupBy('alumno.nombre')->orderBy('librosPrestados','DESC')->take(5)->get();
        return view('welcome')->with('libros',$libros)->with('buscar','')->with('informe', $librosMasPrestados)->with('rankingGrupo', $rankingGrupo)->with('alumnosLectores', $alumnosLectores);
    }
    
    public function captura() {
        $libros = libro::all();
        $librosNoRepetidos = DB::table('libro')->select(DB::raw('Distinct editorial, titulo'))->get();
        return view('captura')->with('cuenta',count($libros))->with('libros',$librosNoRepetidos);
    }

    public function duplicar(Request $request) {
        $cadena1 = explode("(",$request['titulo2']);
        $cadena2= explode(")",$cadena1[1]);
        $titulo =  substr($cadena1[0], 0, -1);;
        $editorial = $cadena2[0];
        $libro = libro::where('titulo', $titulo)->where('editorial', $editorial)->first();
        $libro->identificador = $request['identificador2'];
        $nuevoLibro = new libro();
        $nuevoLibro->titulo = $libro->titulo;
        $nuevoLibro->identificador = $libro->identificador;
        $nuevoLibro->autor= $libro->autor;
        $nuevoLibro->autor2 = $libro->autor2;
        $nuevoLibro->editorial = $libro->editorial;
        $nuevoLibro->NEdicion = $libro->NEdicion;
        $nuevoLibro->notas = $libro->notas;
        $nuevoLibro->isbn = $libro->isbn;
        $nuevoLibro->codigobarras =$libro->codigobarras;
        $nuevoLibro->tema = $libro->tema;
        $nuevoLibro->categoria = $libro->categoria;
        $nuevoLibro->idioma = $libro->idioma;
        $nuevoLibro->tipo = $libro->tipo;
        $nuevoLibro->anio = $libro->anio;
        $nuevoLibro->save();
        return redirect("home");
    }

    public function capturaPOST(Request $request) {
        $nuevoLibro = new libro();
        $nuevoLibro->titulo = $request['titulo'];
        $nuevoLibro->identificador = $request['identificador'];
        $nuevoLibro->autor= $request['autor'];
        $nuevoLibro->autor2 = $request['autor2'];
        $nuevoLibro->editorial = $request['editorial'];
        $nuevoLibro->NEdicion = $request['NEdicion'];
        $nuevoLibro->notas = $request['notas'];
        $nuevoLibro->isbn = $request['isbn'];
        $nuevoLibro->codigobarras = $request['codigobarras'];
        $nuevoLibro->tema = $request['tema'];
        $nuevoLibro->categoria = $request['categoria'];
        $nuevoLibro->idioma = $request['idioma'];
        $nuevoLibro->tipo = $request['tipo'];
        $nuevoLibro->anio = $request['anio'];
        $nuevoLibro->save();
        $log = new logs();
        $log->idUsuario = Auth::user()->id;
        $log->idCambio = $nuevoLibro->id;
        $log->detalles = "Agregar nuevo libro";
        $log->save();
        return redirect("home");
    }

    public function modificaGET($id) {
        $libro = libro::find($id);
        return view('modificaLibro')->with('libro',$libro);
    }

    public function informesGET() {
        $usuarios = alumno::all();
        $libros = libro::all();
        $prestamos = prestamo::all();
        // $librosMasPrestados = DB::table('prestamo')->select(DB::raw('COUNT(idLibro) AS cuenta, idLibro'))->groupBy('idLibro')->get();
        // $usuariosConMasPrestamos = DB::table('prestamo')->select(DB::raw('COUNT(idUsuario) AS cuenta, idUsuario'))->groupBy('idUsuario')->get();
        // // $noDevueltos = DB::table('libro')->select(DB::raw('SELECT * FROM `biblioteca`.`prestamo` WHERE estatus = "Prestado"  AND  DATE(entrega) <= DATE(NOW())'))->get();
        // $noDevueltos = prestamo::where( 'estatus', "Prestado" )->where('entrega','<=', DATE(NOW()))->get();
        // // dd($noDevuletos);
        // return view('informes')->with('libros',$libros)->with('usuarios',$usuarios)->with('librosMasPrestados',$librosMasPrestados)->with('usuariosConMasPrestamos',$usuariosConMasPrestamos)->with('noDevueltos',$noDevueltos);
        return view('informes')->with('usuarios', $usuarios)->with('libros', $libros)->with('prestamos', $prestamos);
    }

    public function modificaLibroPOST(Request $request, $id){
        $nuevoLibro = libro::find($id);
        $nuevoLibro->titulo = $request['titulo'];
        $nuevoLibro->identificador = $request['identificador'];
        $nuevoLibro->autor= $request['autor'];
        $nuevoLibro->autor2 = $request['autor2'];
        $nuevoLibro->editorial = $request['editorial'];
        $nuevoLibro->NEdicion = $request['NEdicion'];
        $nuevoLibro->notas = $request['notas'];
        $nuevoLibro->isbn = $request['isbn'];
        $nuevoLibro->codigobarras = $request['codigobarras'];
        $nuevoLibro->tema = $request['tema'];
        $nuevoLibro->idioma = $request['idioma'];
        $nuevoLibro->tipo = $request['tipo'];
        $nuevoLibro->anio = $request['anio'];
        $nuevoLibro->save();
        $log = new logs();
        $log->idUsuario = Auth::user()->id;
        $log->idCambio = $nuevoLibro->id;
        $log->detalles = "Modificacion de libro";
        $log->save();
        return redirect("home");
    }

    public function prestamos() {
        $libros = libro::all();
         if(Auth::user()->grado == "all") 
            $usuarios = alumno::all();
          else 
            if(Auth::user()->grado == "s") 
                $usuarios = alumno::where('grado','1°A S')->orwhere('grado','1°B S')->orwhere('grado','2°A S')
                ->orwhere('grado','2°B S')->orwhere('grado','3°A S')->orwhere('grado','3°B S')->get();
             else 
                $usuarios = alumno::where('grado',Auth::user()->grado)->get();
         
         
         $resultado = collect([]);
         foreach($usuarios as $alumno){
            $prestamos = prestamo::where('idUsuario',$alumno->id)->where('estatus', 'Prestado')->get();
            if($prestamos->count() != 0)
                $resultado->push($prestamos);
         }
        return view('prestamos')->with('usuarios',$resultado)->with('libros',$libros)->with('prestamos', $prestamos)->with('buscar','')->with('alumnos',$usuarios);
    }

    public function prestamosFast() {
        if(Auth::user()->grado == "all") 
            $alumnos = alumno::all();
        else 
            if(Auth::user()->grado == "s") 
                $alumnos = alumno::where('grado','1°A S')->orwhere('grado','1°B S')->orwhere('grado','2°A S')
                ->orwhere('grado','2°B S')->orwhere('grado','3°A S')->orwhere('grado','3°B S')->get();
            else 
                $alumnos = alumno::where('grado',Auth::user()->grado)->get();
        $prestamos = prestamo::where('estatus','Prestado')->get();
        $libros = libro::all();
        $fecha = DATE('Y-m-d');
        $prestamosPendientes = prestamo::where('entrega','<',$fecha)->where('estatus','Prestado')->get();
        return view('prestamos2')->with('alumnos', $alumnos)->with('prestamos', $prestamos)->with('libros', $libros)->with('prestamosPendientes',$prestamosPendientes);
    }

    public function buscarPrestamo(Request $request ) {
        $alumnos = alumno::where('nombre', 'like' ,'%'.$request['buscar'].'%')->get();
        $libros = libro::all();
        $usuarios = alumno::all();
        $resultado = collect([]);
        foreach($alumnos as $alumno) {
            $prestamos = prestamo::where('idUsuario',$alumno->id)->get();
                if($prestamos->count() != 0)
                        $resultado->push($prestamos);
        }    
        return view('busquedaPrestamos')->with('usuarios',$resultado)->with('buscar',$request['buscar'])->with('alumnos',$usuarios)->with('libros',$libros);
    }

    public function renuevaLibro($id) {
        $prestamo = prestamo::find($id);
        $prestamo->entrega = date("Y-m-d",strtotime($prestamo->entrega."+ 5 days"));
        dd($prestamo);
        $prestamo->save();
        Alert::success('Movimiento realizado con exito');
        return redirect("prestamosfast");
    }

    public function devuelveGET($id) {
        $prestamo = prestamo::find($id);
        $prestamo->estatus = "Devuelto";
        $prestamo->save();
        $log = new logs();
        $log->idUsuario = Auth::user()->id;
        $log->idCambio = $prestamo->id;
        $log->detalles = "recibio un libro";
        $log->save();
        Alert::success('Movimiento realizado con exito');
        return redirect("prestamosfast");
    }
    public function devuelveRanking($id) {
        $prestamo = prestamo::find($id);
        $prestamo->ranking = "on";
        $prestamo->save();
    }

    public function eliminaLibro($id) {
        $libro = libro::find($id);
        $libro->delete();
        $log = new logs();
        $log->idUsuario = Auth::user()->id;
        $log->idCambio = $id;
        $log->detalles = "Elimino un libro";
        $log->save();
        Alert::success('Se ha eliminado exitosamente');
        return redirect("home");
    }

    public function buscarLibro(Request $request ) {
        $libros = libro::where('titulo', 'like' ,'%'.$request['buscar'].'%')->orWhere('autor', 'like' ,'%'.$request['buscar'].'%')->orWhere('editorial', 'like' ,'%'.$request['buscar'].'%')->orWhere('tema', 'like' ,'%'.$request['buscar'].'%')->orWhere('identificador', $request['buscar'])->paginate(10);
        if(Auth::user()){
            if(Auth::user()->grado == "all") {
                $usuarios = alumno::all();
             } else {
                if(Auth::user()->grado == "s") {
                    $usuarios = alumno::where('grado','1°A S')->orwhere('grado','1°B S')->orwhere('grado','2°A S')
                    ->orwhere('grado','2°B S')->orwhere('grado','3°A S')->orwhere('grado','3°B S')->get();
                 } else {
                    $usuarios = alumno::where('grado', Auth::user()->grado);
                 }
             }
        } else {
            $usuarios = alumno::all();
        }         
        return view('busquedaLibros')->with('libros',$libros)->with('buscar',$request['buscar'])->with('usuarios',$usuarios);
    }

    public function buscarLibroDetalles(Request $request ) {
        $libros = libro::where('titulo', 'like' ,'%'.$request['buscar'].'%')->orWhere('autor', 'like' ,'%'.$request['buscar'].'%')->orWhere('editorial', 'like' ,'%'.$request['buscar'].'%')->orWhere('tema', 'like' ,'%'.$request['buscar'].'%')->orWhere('identificador', $request['buscar'])->get();
        $prestamos = prestamo::all();
        if(Auth::user()){
            if(Auth::user()->grado == "all") {
                $usuarios = alumno::all();
             } else {
                if(Auth::user()->grado == "s") {
                    $usuarios = alumno::where('grado','1°A S')->orwhere('grado','1°B S')->orwhere('grado','2°A S')
                    ->orwhere('grado','2°B S')->orwhere('grado','3°A S')->orwhere('grado','3°B S')->get();
                 } else {
                    $usuarios = alumno::where('grado', Auth::user()->grado);
                 }
             }
        } else {
            $usuarios = alumno::all();
        }         
        return view('homeBusqueda')->with('libros',$libros)->with('buscar',$request['buscar'])->with('usuarios', $usuarios)->with('prestamos', $prestamos);
    }

    public function filtraPorNumeros(Request $request) {
        $libros = libro::whereBetween('identificador', [$request['del'],$request['al']])->orderBy('identificador','asc')->get();
        $usuarios = alumno::all();
        return view('homeBusqueda')->with('libros',$libros)->with('buscar',$request['buscar'])->with('usuarios',$usuarios);

    }

    public function prestamoPOST(Request $request) {
        $libro = libro::find($request['idLibro']);
        $prestamo = new prestamo();
        $prestamo->idLibro = $request['idLibro'];
        $prestamo->idUsuario = $request['idUsuario'];
        $prestamo->prestamo = $request['fechaPrestamo'];
        $prestamo->estatus = "Prestado";
        $prestamo->ranking = $request['ranking'];
        if($libro->categoria == "Bronce")
            $prestamo->entrega = date("Y-m-d",strtotime($prestamo->prestamo."+ 5 days"));
        if($libro->categoria == "Plata")
            $prestamo->entrega = date("Y-m-d",strtotime($prestamo->prestamo."+ 7 days"));
        if($libro->categoria == "Oro")
            $prestamo->entrega = date("Y-m-d",strtotime($prestamo->prestamo."+ 10 days"));
        if($libro->categoria == "Platino")
            $prestamo->entrega = date("Y-m-d",strtotime($prestamo->prestamo."+ 15 days"));
        $prestamo->save();
        $log = new logs();
        $log->idUsuario = Auth::user()->id;
        $log->idCambio = $prestamo->id;
        $log->detalles = "Presto de un libro";
        $log->save();
        Alert::success('Movimiento realizado con exito');
        return redirect("prestamos");
    }

    public function etiquetas() {
        $libros = DB::table('libro')->orderBy('identificador', 'desc')->paginate(48);
        $cuenta = libro::all();
        return view('etiquetas')->with('cuenta',count($cuenta))->with('libros',$libros);
    }

    public function altadeusuarios() {
        return view('altadeusuarios');
    }

    public function subiralumnos( Request $request) {
        $alumnos = explode("\r\n", $request['alumnos']);
        foreach($alumnos as $alumno)
        {
            $alumnoNuevo = new alumno();
            $alumnoNuevo->nombre = $alumno;
            $alumnoNuevo->grado = $request['grado'];
            $alumnoNuevo->save();
        }
        return redirect("altadeusuarios");
    }

    public function buscaqr($id) {
        $libro = libro::find($id);
        $usuarios = alumno::all();
        return view('detalles')->with('libro',$libro)->with('usuarios',$usuarios);
    }
    
    public function inicioreservacion () {
        $data = reservacion::all();
        $json = json_encode($data);
        $maestros = user::all();
        return view('reservacion')->with("datos",$json)->with('maestros',$maestros);
    }

    public function reservacionPost(Request $request) {
        // 2022-04-06T12:32
        $data = reservacion::all();
        $hora = $request['hora'] . ":" . $request['minuto'];
        $reservacion = new reservacion();
        $reservacion->fecha = $request['fecha'];
        $reservacion->hora = $hora;
        $fechatexto = $request['fecha'] . " " . $hora;
        $NuevaFecha = strtotime ( '+30 minute' , strtotime ($fechatexto) ) ; 
        $reservacion->title = Auth::user()->name;
        $reservacion->start = $fechatexto;
        $reservacion->end = date ( 'Y-m-d H:i:s' , $NuevaFecha);
        $reservacion->color = $request['color'];
        // dd($reservacion);
        
        foreach($data as $evento){
            if($evento->fecha == $reservacion->fecha && $evento->hora == $reservacion->hora){
                Alert::error('error al reservar a esa hora');
                return redirect()->back();
            }
                
        }
        $reservacion->save();
        return redirect()->back();
    }

    public function reservacionPostOtro(Request $request) {
        $data = reservacion::all();
        $hora = $request['horaO'] . ":" . $request['minutoO'];
        $reservacion = new reservacion();
        $reservacion->fecha = $request['fechaO'];
        $reservacion->hora = $hora;
        $fechatexto = $request['fechaO'] . " " . $hora;
        $NuevaFecha = strtotime ( '+30 minute' , strtotime ($fechatexto) ) ; 
        $reservacion->title = $request['maestro'];
        $reservacion->start = $fechatexto;
        $reservacion->end = date ( 'Y-m-d H:i:s' , $NuevaFecha);
        $reservacion->color = $request['colorO'];
        // dd($reservacion);
        
        foreach($data as $evento){
            if($evento->fecha == $reservacion->fecha && $evento->hora == $reservacion->hora){
                Alert::error('error al reservar a esa hora');
                return redirect()->back();
            }  
        }
        $reservacion->save();
        return redirect()->back();
    }


    public function passwordGET() {
        return view('cambioContraseña');
    }

    public function passwordPOST(Request $request) {
        $usuario = Auth::user();
        $nuevaPassword = $request['password'];
        if($request['password'] == $request['passwordConfirm']) {
            $usuario->password = Hash::make($nuevaPassword);
            $usuario->save();
            Alert::success('Contraseña cambiada correctamente');
        }else {
            Alert::error('Las contraseñas no son las mismas');
        }
        
        return view('cambioContraseña');
    }
}
