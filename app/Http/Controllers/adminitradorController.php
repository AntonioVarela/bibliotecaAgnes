<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;
use App\logs;
use App\prestamo;
use App\alumno;
use App\reservacion;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminitradorController extends Controller
{

    public function principal() {
        $libros = libro::orderBy('identificador', 'DESC')->paginate(10);
        return view('welcome')->with('libros',$libros)->with('buscar','');
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
        // $usuarios = usuarios::all();
        // $libros = libro::all();
        // $prestamos = prestamo::all();
        // $librosMasPrestados = DB::table('prestamo')->select(DB::raw('COUNT(idLibro) AS cuenta, idLibro'))->groupBy('idLibro')->get();
        // $usuariosConMasPrestamos = DB::table('prestamo')->select(DB::raw('COUNT(idUsuario) AS cuenta, idUsuario'))->groupBy('idUsuario')->get();
        // // $noDevueltos = DB::table('libro')->select(DB::raw('SELECT * FROM `biblioteca`.`prestamo` WHERE estatus = "Prestado"  AND  DATE(entrega) <= DATE(NOW())'))->get();
        // $noDevueltos = prestamo::where( 'estatus', "Prestado" )->where('entrega','<=', DATE(NOW()))->get();
        // // dd($noDevuletos);
        // return view('informes')->with('libros',$libros)->with('usuarios',$usuarios)->with('librosMasPrestados',$librosMasPrestados)->with('usuariosConMasPrestamos',$usuariosConMasPrestamos)->with('noDevueltos',$noDevueltos);
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
         if(Auth::user()->grado == "all") {
            $usuarios = alumno::all();
         }else {
            if(Auth::user()->grado == "s") {
                $usuarios = alumno::where('grado','1°A S')->orwhere('grado','1°B S')->orwhere('grado','2°A S')
                ->orwhere('grado','2°B S')->orwhere('grado','3°A S')->orwhere('grado','3°B S')->get();
             } else {
                 $usuarios = alumno::where('grado',Auth::user()->grado)->get();
             }
         }
         
         $resultado = collect([]);
         foreach($usuarios as $alumno){
            $prestamos = prestamo::where('idUsuario',$alumno->id)->get();
            if($prestamos->count() != 0)
                        $resultado->push($prestamos);
         }
        //  $librosMasPrestados = DB::raw('SELECT COUNT(idLibro ) AS cuenta, idLibro FROM `biblioteca`.`prestamo`GROUP BY idLibro');
        return view('prestamos')->with('usuarios',$resultado)->with('libros',$libros)->with('prestamos', $prestamos)->with('buscar','')->with('alumnos',$usuarios);
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

    public function devuelveGET($id) {
        // dd($id);
        $prestamo = prestamo::find($id);
        $prestamo->estatus = "Devuelto";
        $prestamo->save();
        $log = new logs();
        $log->idUsuario = Auth::user()->id;
        $log->idCambio = $prestamo->id;
        $log->detalles = "recibio un libro";
        $log->save();
        Alert::success('Movimiento realizado con exito');
        return redirect("prestamos");
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
        return view('homeBusqueda')->with('libros',$libros)->with('buscar',$request['buscar'])->with('usuarios',$usuarios);
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
        // $json = response()->json($data,200,[]);
        $json = json_encode($data);
        // dd($data);
        return view('reservacion')->with("datos",$json);
        }
}
