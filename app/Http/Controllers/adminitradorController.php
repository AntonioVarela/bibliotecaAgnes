<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;
use App\prestamo;
use App\usuarios;
use RealRashid\SweetAlert\Facades\Alert;
class adminitradorController extends Controller
{
    
    public function captura()
    {
        $libros = libro::all();
        return view('captura')->with('cuenta',count($libros));
    }
    public function capturaPOST(Request $request)
    {
        $file = $request->file('subir');
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
        $nuevoLibro->imagen = time()."_".$file->getClientOriginalName();
        $nuevoLibro->save();

        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('public')->put($nombre,  \File::get($file));
        return redirect("home");
    }
    
    public function modificaGET($id) {
        $libro = libro::find($id);
        return view('modificaLibro')->with('libro',$libro);
    }

    public function informesGET($id) {
        $libro = libro::all();
        $prestamos = prestamo::all();
        return view('modificaLibro')->with('libro',$libro);
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
        return redirect("home");
    }

    public function prestamos() {
        $usuarios = usuarios::all();
        $libros = libro::all();
        $prestamos = prestamo::paginate(10);
        return view('prestamos')->with('usuarios',$usuarios)->with('libros',$libros)->with('prestamos', $prestamos)->with('buscar','');
    }

    public function eliminaLibro($id) {
        $libro = libro::find($id);
        $libro->delete();
        Alert::success('Se ha eliminado exitosamente');
        return redirect("home");
    }

    public function buscarLibro(Request $request ) {
        $libros = libro::where('titulo',$request['buscar'])->orWhere('autor',$request['buscar'])->orWhere('editorial',$request['buscar'])->orWhere('tema',$request['buscar'])->paginate(10);
        return view('home')->with('libros',$libros)->with('buscar',$request['buscar']);
    }

    public function buscarPrestamo(Request $request ) {
        $prestamos = prestamo::where('titulo',$request['buscar'])->orWhere('autor',$request['buscar'])->orWhere('editorial',$request['buscar'])->orWhere('tema',$request['buscar'])->paginate(10);
        return view('home')->with('libros',$prestamos)->with('buscar',$request['buscar']);
    }

    public function usuariosPOST(Request $request) {
        $usuario = new usuarios();
        $usuario->nombre = $request['nombre'];
        $usuario->apellidoP = $request['apellidoP'];
        $usuario->apellidoM = $request['apellidoM'];
        $usuario->tipo= $request['tipo'];
        if($request['tipo']=="Alumno")
        $rest = '01'.substr($request['nombre'], 0, 2).substr($request['apellidoP'], 0, 2).substr($request['apellidoM'], 0, 2).$usuario->id;
        else
        $rest = '00'.substr($request['nombre'], 0, 2).substr($request['apellidoP'], 0, 2).substr($request['apellidoM'], 0, 2).$usuario->id;
        $usuario->clave = $rest;
        $usuario->save();
        Alert::success('Se ha añadido exitosamente');
        return redirect("prestamos");
    }
    public function prestamoPOST(Request $request) {
        $prestamo = new prestamo();
        $prestamo->idLibro = $request['idLibro'];
        $prestamo->idUsuario = $request['idUsuario'];
        $prestamo->prestamo = $request['fechaPrestamo'];
        $prestamo->entrega = date("Y-m-d",strtotime($prestamo->prestamo."+ 5 days"));
        $prestamo->save();
        Alert::success('Se ha añadido exitosamente');
        return redirect("prestamos");
    }

    public function usuarios()
    {
        $usuarios = usuarios::paginate(50);
        return view('usuarios')->with('usuarios',$usuarios)->with('buscar','');
    }
}
