@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container p-4" >
    <div class="row text-center" >
    <h2 >Prestamos (Activos)</h2>
    <div class="row justify-content-center pr-3 pb-3">
      <div class="p-2">
        <form action="{{route('buscarPrestamo')}}" method="POST">
          @csrf
          <input type="search" class="input-search col-md-8 col-sm-8" name="buscar" id="buscar" autocomplete="off" placeholder="Buscar por Titulo de libro o Clave de usuario" value="{{$buscar != ''?$buscar:''}}">
          @if ($libros->count() == 0)
            <button type="submit" class="button-search" disabled><i class="fas fa-search"></i> Buscar</button>
            @if ($buscar != '' || $libros->count() == 0)
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
    @if ($usuarios->count() == 0)
    <div class="row text-center">
        <h1 class="display-4">No hay usuarios para hacer prestamos</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-usuario"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            Presiona aqui para agregar uno nuevo
        </button>
    </div>
    @else
    @if ($libros->count() == 0)
    <div class="row text-center">
        <h1 class="display-4">No hay libros para hacer prestamos</h1>
    </div>
    @else
    <button class="btn-flotante" type="button" data-bs-toggle="modal" data-bs-target="#modalPrestamos">
        <i class="fas fa-plus"></i> Nuevo Prestamo
    </button>
    <div class="row table-responsive" >
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                  <th scope="col">Titulo</th>
                  <th scope="col">Autor</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">prestamo</th>
                  <th scope="col">Entrega</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($prestamosA as $prestamo)
                @if(date('Y-m-d',strtotime("-1 days")) >= $prestamo->entrega )
              <tr class="table-danger">
              @else
              <tr>
              @endif
                    @foreach ($libros as $libro)
                    @if($prestamo->idLibro == $libro->id)
                    <td>{{ucwords($libro->titulo)}}</td>
                    <td>{{ucwords($libro->autor)}}</td>
                    @endif
                    @endforeach
                  
                    @foreach ($usuarios as $usuario)
                    {{-- {{$nombreCompleto = $usuario->nombre + $usuario->nombre +$usuario->nombre}} --}}
                    <td>{{$prestamo->idUsuario == $usuario->id?ucwords($usuario->nombre).' '.ucwords($usuario->apellidoP).' '.ucwords($usuario->apellidoM):''}}</td>
                    @endforeach
                    <td>{{$prestamo->prestamo}}</td>
                    <td>{{$prestamo->entrega}}</td>
                  <td>
                    <a href="{{route('devuelve', ['id' => $prestamo->id])}}" style="color: RED;" title="Modificar">Devolver</a>
                  </form>
                  </td>
                </tr>
                @endforeach
                
                
              </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
      <div class="col-1">
        {{-- {{ $libros->links() }} --}}
      </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-1">
          {{ $prestamosA->links() }}
        </div>
      </div>
    @endif
    
</div>

<div class="container p-4" >
  <div class="row text-center" >
  <h2 >Historico</h2>
  </div>
  @if ($usuarios->count() == 0)
  <div class="row text-center">
      <h1 class="display-4">No hay usuarios para hacer prestamos</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-usuario"  data-bs-toggle="modal" data-bs-target="#exampleModal">
          Presiona aqui para agregar uno nuevo
      </button>
  </div>
  @else
  @if ($libros->count() == 0)
  <div class="row text-center">
      <h1 class="display-4">No hay libros para hacer prestamos</h1>
  </div>
  @else
  <button class="btn-flotante" type="button" data-bs-toggle="modal" data-bs-target="#modalPrestamos">
      <i class="fas fa-plus"></i> Nuevo Prestamo
  </button>
  <div class="row table-responsive" >
      <table class="table table-striped">
          <thead class="table-dark">
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Usuario</th>
                <th scope="col">prestamo</th>
                <th scope="col">Entrega</th>
                <th>Devuelto</th>
              </tr>
            </thead>
            <tbody>
              @foreach($prestamos as $prestamo)
              <tr>
                  @foreach ($libros as $libro)
                  @if($prestamo->idLibro == $libro->id)
                  <td>{{ucwords($libro->titulo)}}</td>
                  <td>{{ucwords($libro->autor)}}</td>
                  @endif
                  @endforeach
                
                  @foreach ($usuarios as $usuario)
                  {{-- {{$nombreCompleto = $usuario->nombre + $usuario->nombre +$usuario->nombre}} --}}
                  <td>{{$prestamo->idUsuario == $usuario->id?ucwords($usuario->nombre).' '.ucwords($usuario->apellidoP).' '.ucwords($usuario->apellidoM):''}}</td>
                  @endforeach
                  <td>{{$prestamo->prestamo}}</td>
                  <td>{{$prestamo->entrega}}</td>
                  <td>{{$prestamo->updated_at}}</td>
                
              </tr>
              @endforeach
              
              
            </tbody>
      </table>
  </div>
  <div class="row justify-content-center">
    <div class="col-1">
      {{-- {{ $libros->links() }} --}}
    </div>
  </div>
  @endif
  <div class="row justify-content-center">
      <div class="col-1">
        {{ $prestamos->links() }}
      </div>
    </div>
  @endif
  
</div>

<!-- Modal prestamos -->
  <div class="modal fade" id="modalPrestamos" tabindex="-1" aria-labelledby="modalPrestamosLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPrestamosLabel">Hacer Prestamo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('prestamoPOST')}}" id="PrestamoPOST" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Libro: </label>
                    <select name="idLibro" id="idLibro" class="form-select">
                        @foreach ($libros as $libro)
                            <option value="{{$libro->id}}">{{$libro->titulo}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="apellidoP" class="form-label">Usuario: </label>
                    <select name="idUsuario" id="idUsuario" class="form-select">
                        @foreach ($usuarios as $usuario)
                            <option value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellidoP}} {{$usuario->apellidoM}}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-usuario" title="Agregar Usuario" data-bs-toggle="modal" data-bs-target="#exampleModal" style="position: relative;left:10%;">
                      <i class="fas fa-user-plus"></i>
                    </button>
                
                  </div>
                  <div class="mb-3">
                    <label for="fechaPrestamo" class="form-label">Fecha Prestamo</label>
                    <input type="date" class="form-control" id="fechaPrestamo" value="<?php echo date('Y-m-d'); ?>" name="fechaPrestamo" required>
                  </div>        
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
            <button type="button" onclick="confirmarPrestamo()" class="btn btn-primary">Guardar</button>

            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal usuarios -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('usuarioPOST')}}" method="post">
            @csrf
            <div class="modal-body">
          
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="apellidoP" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidoP" name="apellidoP" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="apellidoM" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidoM" name="apellidoM" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="Alumno">Alumno</option>
                        <option value="Maestro">Maestro</option>
                    </select>
                  </div>
        
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection