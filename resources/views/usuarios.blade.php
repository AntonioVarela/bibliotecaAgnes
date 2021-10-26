@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="row text-center" >
    <h2 >Usuarios</h2>
    <div class="row justify-content-center pr-3 pb-3">
      <div class="p-2">
        <form action="{{route('buscarPrestamo')}}" method="POST">
          @csrf
          <input type="search" class="input-search col-md-8 col-sm-8" name="buscar" id="buscar" autocomplete="off" placeholder="Buscar por titulo, autor, editorial o tema" value="{{$buscar != ''?$buscar:''}}">
          @if ($usuarios->count() == 0)
            <button type="submit" class="button-search" disabled><i class="fas fa-search"></i> Buscar</button>
            @if ($buscar != '' || $usuarios->count() == 0)
            <a class=" button-search-cancelar" href="{{route('prestamos')}}"><i class="fas fa-times"></i> Cancelar</a>
            @endif
            @else
            <button type="submit" class="button-search"><i class="fas fa-search"></i> Buscar</button>
            @if ($buscar != '')
            <a class="button-search-cancelar" href="{{route('prestamos')}}"><i class="fas fa-times"></i> Cancelar</a>
            @endif
          @endif
        </form>
      </div>
    </div>
    </div>
    <div class="row table-responsive" >
        <table class="table table-striped">
            <thead class="table-dark">
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