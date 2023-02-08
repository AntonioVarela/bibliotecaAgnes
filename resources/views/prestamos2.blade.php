@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container">
{{-- boton de nuevos prestamos --}}
    <button class="btn-flotante" type="button" data-bs-toggle="modal" data-bs-target="#modalPrestamos">
        <i class="fas fa-plus"></i> Nuevo Prestamo
    </button>
    <p class="fs-2">Libros Prestados activos</p>
<table class="table table-sm table-hover">
    <thead class="table-success">
        <th>Alumno</th>
        <th>Grado</th>
        <th>Libro</th>
        <th>Posicion</th>
        <th>Fecha Entrega</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach ($prestamos as $prestamo)
        <tr>
            @foreach ($alumnos as $alumno)
            @if($alumno->id == $prestamo->idUsuario && $prestamo->entrega >= DATE('Y-m-d'))
                <td class="text-capitalize">{{$alumno->nombre}}</td>
                <td>{{$alumno->grado}}</td>
            
            @foreach ($libros as $libro)
            @if($libro->id == $prestamo->idLibro)
                <td>{{$libro->titulo}}</td>
                <td>{{$libro->identificador}}</td>
            @endif
            @endforeach
            <td>{{$prestamo->entrega}}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="confirmarEntrega({{$prestamo->id}})">Devolver</button>
                <button class="btn btn-warning btn-sm" onclick="renovarPrestamo({{$prestamo->id}})">Renovar</button>
            </td>
            @endif
            @endforeach
            
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<p class="fs-2">Libros Prestados Pendientes</p>
<table class="table table-sm table-hover">
    <thead class="table-danger">
        <th>Alumno</th>
        <th>Grado</th>
        <th>Libro</th>
        <th>posicion</th>
        <th>Estatus</th>
        <th>Fecha Entrega</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach ($prestamosPendientes as $prestamo)
        <tr>
            @foreach ($alumnos as $alumno)
            @if($alumno->id == $prestamo->idUsuario)
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->grado}}</td>
                @foreach ($libros as $libro)
                @if($libro->id == $prestamo->idLibro)
                    <td>{{$libro->titulo}}</td>
                    <td>{{$libro->identificador}}</td>
                @endif
                @endforeach
            <td>{{$prestamo->estatus}}</td>
            <td>{{$prestamo->entrega}}</td>
            <td>
                <button class="btn btn-danger btn-sm"  onclick="confirmarEntrega({{$prestamo->id}})">Devolver</button>
                <button class="btn btn-warning btn-sm" onclick="renovarPrestamo({{$prestamo->id}})">Renovar</button>
            </td>
            @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
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
            <button type="button" onclick="confirmarPrestamo()" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div> 
@endsection