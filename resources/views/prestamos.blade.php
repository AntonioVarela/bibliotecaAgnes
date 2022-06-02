@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="" style="margin:10px 10px;" >
    <div class="row text-center bg-white p-3" style="border-radius: 25px; margin:10px 10px;" >
    <h2 >Prestamos</h2>
    <div class="row justify-content-center">
      <div class="p-2">
        <form action="{{route('buscarPrestamo')}}" method="POST">
          @csrf
          <input type="search" class="input-search col-md-8 col-sm-8" name="buscar" id="buscar" autocomplete="off" placeholder="Buscar por nombre de usuario" value="{{$buscar != ''?$buscar:''}}">
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
    {{-- boton de nuevos prestamos --}}
    <button class="btn-flotante" type="button" data-bs-toggle="modal" data-bs-target="#modalPrestamos">
        <i class="fas fa-plus"></i> Nuevo Prestamo
    </button>
    {{-- fin de boton de nuevos prestamos --}}
{{-- inicio de cards de prestamos --}}
<div class="row" style="margin:10px 0px;">
  @foreach ($usuarios as $usuario)
  <div class="col-4">
      <div class="card mt-2" style=" border-radius: 25px;">
        <div class="card-body">
          <div class="list-group">
          @foreach ($alumnos as $alumno)
              @if ($alumno->id == $usuario[0]->idUsuario)
              
              <strong>{{$alumno->nombre}}</strong>
              <span>({{$alumno->grado}})</span>
              @endif
          @endforeach
          @foreach ($usuario as $item)
          @foreach ($libros as $libro)
              @if ($libro->id == $item->idLibro)
              @if ($item->entrega < DATE('Y-m-d') && $item->estatus != "Devuelto")
                <button type="button" class=" mt-3 list-group-item list-group-item-action text-danger" title="devolver" onclick="confirmarEntrega({{$item->id}})"><i class="fa-solid fa-hand-holding fa-lg"></i> {{$libro->titulo}} <span class="badge bg-secondary">{{$libro->identificador}}</span>
                  <br>Fecha de entrega: {{$item->entrega}}</button>
                @else
                @if ($item->entrega == DATE('Y-m-d') && $item->estatus != "Devuelto")
                <button type="button" class=" mt-3 list-group-item list-group-item-action" style="color:orange;" title="devolver" onclick="confirmarEntrega({{$item->id}})"><i class="fa-solid fa-hand-holding fa-lg"></i> {{$libro->titulo}} <span class="badge bg-secondary">{{$libro->identificador}}</span>
                  <br>Fecha de entrega: {{$item->entrega}}</button>
                @else
                @if ($item->estatus == "Prestado")
                <button type="button" class="mt-3 list-group-item list-group-item-action  text-success" title="devolver" onclick="confirmarEntrega({{$item->id}})"><i class="fa-solid fa-hand-holding fa-lg"></i> {{$libro->titulo}} <span class="badge bg-secondary">{{$libro->identificador}}</span>
                  <br>Fecha de entrega: {{$item->entrega}}</button>
                @else
                <button type="button" class="mt-3 list-group-item list-group-item-action" disabled><i class="fa-solid fa-hand-holding fa-lg"></i> {{$libro->titulo}} <span class="badge bg-secondary">{{$libro->identificador}}</span> </button>
                @endif
                @endif
                @endif
              @endif
          @endforeach
          @endforeach
      </div>
  </div>
</div>
</div>
  @endforeach
</div>
  {{-- fin de cards de prestamos --}}
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
                    <select name="idLibro" id="idLibro" class="form-control" style="width: 100%">
                        @foreach ($libros as $libro)
                            <option value="{{$libro->id}}">{{ucwords($libro->titulo)}} (<strong>Posicion:</strong>{{$libro->identificador}})</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="apellidoP" class="form-label">Usuario: </label>
                    <select name="idUsuario" id="idUsuario" class="form-control" style="width: 100%">
                        @foreach ($alumnos as $usuario)
                            <option value="{{$usuario->id}}">{{ucwords($usuario->nombre)}} ({{$usuario->grado}}) </option>
                        @endforeach
                    </select>                
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
@endsection