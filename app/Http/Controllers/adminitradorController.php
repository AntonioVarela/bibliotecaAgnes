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
        $libro = new libro();
        return view('captura')->with('libro',$libro);
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
        $nuevoLibro->idioma = $request['idioma'];
        $nuevoLibro->tipo = $request['tipo'];
        $nuevoLibro->anio = $request['anio'];
        $nuevoLibro->save();
        return redirect("home");
    }
    
    public function modificaGET($id) {
        $libro = libro::find($id);
        // DD($libro);
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
        return view('prestamos')->with('usuarios',$usuarios)->with('libros',$libros)->with('prestamos', $prestamos);
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

    public function usuariosPOST(Request $request) {
        $usuario = new usuarios();
        $usuario->nombre = $request['nombre'];
        $usuario->apellidoP = $request['apellidoP'];
        $usuario->apellidoM = $request['apellidoM'];
        $usuario->clave = $request['clave'];
        $usuario->tipo= $request['tipo'];
        $usuario->save();
        Alert::success('Se ha añadido exitosamente');
        return redirect("prestamos");
    }
    public function prestamoPOST(Request $request) {
        $prestamo = new prestamo();
        $prestamo->idLibro = $request['idLibro'];
        $prestamo->idUsuario = $request['idUsuario'];
        $prestamo->prestamo = $request['fechaPrestamo'];
        $prestamo->entrega = $request['fechaEntrega'];
        $prestamo->save();
        Alert::success('Se ha añadido exitosamente');
        return redirect("prestamos");
    }

    public function usuarios()
    {
        $usuarios = usuarios::paginate(50);
        return view('usuarios')->with('usuarios',$usuarios);
    }
}
