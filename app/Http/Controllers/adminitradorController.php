<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;
use App\logs;
use App\prestamo;
use App\alumno;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminitradorController extends Controller
{

    public function principal() {
        $libros = libro::orderBy('identificador', 'ASC')->paginate(10);
        return view('welcome')->with('libros',$libros)->with('buscar','');
    }
    
    public function captura()
    {
        $libros = libro::all();
        $librosNoRepetidos = DB::table('libro')->select(DB::raw('Distinct editorial, titulo'))->get();
        return view('captura')->with('cuenta',count($libros))->with('libros',$librosNoRepetidos);
    }

    public function duplicar(Request $request){
        $total = count(libro::all());
        $cadena1 = explode("(",$request['titulo2']);
        $cadena2= explode(")",$cadena1[1]);
        $titulo =  substr($cadena1[0], 0, -1);;
        $editorial = $cadena2[0];
        $libro = libro::where('titulo', $titulo)->where('editorial', $editorial)->first();
        $libro->identificador = $total;
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

    public function capturaPOST(Request $request)
    {
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
        $prestamos = prestamo::all();
        $libros = libro::all();
        $hoy = DATE('Y-m-d');
         if(Auth::user()->grado == "all") {
            $usuarios = alumno::all();
         }
         if(Auth::user()->grado == "s") {
            $usuarios = alumno::where('grado','1°A S')->orwhere('grado','1°B S')->orwhere('grado','2°A S')
            ->orwhere('grado','2°B S')->orwhere('grado','3°A S')->orwhere('grado','3°B S')->get();
         }

         $librosMasPrestados = DB::raw('SELECT COUNT(idLibro ) AS cuenta, idLibro FROM `biblioteca`.`prestamo`GROUP BY idLibro');
        return view('prestamos')->with('usuarios',$usuarios)->with('libros',$libros)->with('prestamos', $prestamos)->with('buscar','');
    }

    public function devuelveGET($id) {
        $prestamo = prestamo::find($id);
        $prestamo->estatus = "Devuelto";
        $prestamo->save();
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
        $libros = libro::where('titulo', 'like' ,'%'.$request['buscar'].'%')->orWhere('autor', 'like' ,'%'.$request['buscar'].'%')->orWhere('editorial', 'like' ,'%'.$request['buscar'].'%')->orWhere('tema', 'like' ,'%'.$request['buscar'].'%')->paginate(10);
        return view('home')->with('libros',$libros)->with('buscar',$request['buscar']);
    }

    public function buscarPrestamo(Request $request ) {
        // $libro = libro::where('titulo', 'like' ,'%'.$request['buscar'].'%')->get();
        // dd($libro);
        // if(count($libro) != 0) {
        //     foreach($libro as $l) {
        //     }
        //     $prestamos = prestamo::where('idLibro',$libro->id)->paginate(10);
        // }
        // $usuario = usuarios::where('clave', 'like' ,'%'.$request['buscar'].'%')->get();
        // if(count($usuario) != 0) {
        //     $prestamos = prestamo::where('idUsuario',$usuario->id)->paginate(10);
        // }
        
        // return view('home')->with('libros',$prestamos)->with('buscar',$request['buscar']);
    }

    public function usuariosPOST(Request $request) {
        // $usuario = new usuarios();
        // $usuario->nombre = $request['nombre'];
        // $usuario->apellidoP = $request['apellidoP'];
        // $usuario->apellidoM = $request['apellidoM'];
        // $usuario->tipo= $request['tipo'];
        // if($request['tipo']=="Alumno")
        // $rest = '01'.substr($request['nombre'], 0, 2).substr($request['apellidoP'], 0, 2).substr($request['apellidoM'], 0, 2).$usuario->id;
        // else
        // $rest = '00'.substr($request['nombre'], 0, 2).substr($request['apellidoP'], 0, 2).substr($request['apellidoM'], 0, 2).$usuario->id;
        // $usuario->clave = $rest;
        // $usuario->save();
        // $log = new logs();
        // $log->idUsuario = Auth::user()->id;
        // $log->idCambio = $usuario->id;
        // $log->detalles = "Agrego un usuario";
        // $log->save();
        // Alert::success('Se ha añadido exitosamente');
        // return redirect("prestamos");
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

    public function usuarios()
    {
        // $usuarios = usuarios::paginate(50);
        // return view('usuarios')->with('usuarios',$usuarios)->with('buscar','');
    }

    public function etiquetas()
    {
        $libros = DB::table('libro')->orderBy('identificador', 'desc')->get();
        return view('etiquetas')->with('cuenta',count($libros))->with('libros',$libros);
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
        return view('detalles')->with('libro',$libro);
    }
        
}
