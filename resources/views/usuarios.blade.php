@extends('layouts.app')

@section('content')
<div class="container p-4" style="background-color: #00000085; color: white;">
    <div class="row text-center" >
    <h2 >Usuarios</h2>
    </div>
    <div class="row table-responsive" >
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                  <th scope="col">Clave</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido Paterno</th>
                  <th scope="col">Apellido Materno</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                  <th scope="row">{{$usuario->clave}}</th>
                  <td>{{ucwords($usuario->nombre)}}</td>
                  <td>{{ucwords($usuario->apellidoP)}}</td>
                  <td>{{ucwords($usuario->apellidoM)}}</td>
                  <td>
                    <a href="modificarlibro/{{$usuario->id}}" class="link-primary" title="Modificar"><i class="fas fa-edit"></i></a>
                    <form action="{{route('eliminaLibro',['id'=>$usuario->id])}}" name="eliminarLibro" method="post">@csrf<button type="button" onclick="eliminar()" class="link-primary" style="border:none; padding: 0; background: none;" title="Eliminar"><i class="fas fa-trash"></i></button></form>
                  </td>
                </tr>
                @endforeach
                
                
              </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
      <div class="col-1">
        {{ $usuarios->links() }}
      </div>
    </div>
</div>
@endsection