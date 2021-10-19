@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
@if ($libros->count() == 0)
<div class="alert alert-danger" role="alert">
  No hay libro registrados
</div>
@endif

<div class="container p-4" style="background-color: #00000085; color: white;">
  <a href="captura" class="btn-flotante"><i class="fas fa-plus"></i> Nuevo Libro</a>
  <div class="row text-center" >
    <h2 >Libros en existencia</h2>
    <div class="row justify-content-center pr-3 pb-3">
      <div class="col-8">
        <form action="{{route('buscar')}}" method="POST">
          @csrf
          <input type="search" class="form-control" name="buscar" id="buscar" placeholder="Buscar por titulo, autor, editorial o tema" value="{{$buscar != ''?$buscar:''}}">
          @if ($libros->count() == 0)
            <button type="submit" class="btn btn-info" disabled><i class="fas fa-search"></i> Buscar</button>
            @if ($buscar != '')
            <a class=" btn btn-danger" href="{{route('home')}}"><i class="fas fa-times"></i> Cancelar</a>
            @endif
            @else
            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Buscar</button>
            @if ($buscar != '')
            <a class="btn btn-danger" href="{{route('home')}}"><i class="fas fa-times"></i> Cancelar</a>
            @endif
          @endif
        </form>
      </div>
    </div>
  </div>    
    <div class="row table-responsive" >
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Autor</th>
                  <th scope="col">Editorial</th>
                  <th scope="col">N° Edicion</th>
                  <th scope="col">Tema</th>
                  <th scope="col">Tipo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($libros as $libro)
                <tr>
                  <th scope="row">{{$libro->id}}</th>
                  <td>{{ucwords($libro->titulo)}}</td>
                  <td>{{ucwords($libro->autor)}}</td>
                  <td>{{ucwords($libro->editorial)}}</td>
                  <td>{{$libro->NEdicion}}</td>
                  <td>{{$libro->tema}}</td>
                  <td>{{$libro->tipo}}</td>
                  <td>
                    <a href="modificarlibro/{{$libro->id}}" class="link-primary" title="Modificar"><i class="fas fa-edit"></i></a>
                    <form action="{{route('eliminaLibro',['id'=>$libro->id])}}" name="eliminarLibro" method="post">@csrf<button type="button" onclick="eliminar()" class="link-primary" style="border:none; padding: 0; background: none;" title="Eliminar"><i class="fas fa-trash"></i></button></form>
                  </td>
                </tr>
                @endforeach
                
                
              </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
      <div class="col-1">
        {{ $libros->links() }}
      </div>
    </div>
</div>
@endsection
