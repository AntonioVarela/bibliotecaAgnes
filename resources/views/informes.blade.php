@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-stripe">
  <thead>
    <th>Alumno</th>
    <th>Grupo</th>
    <th>Libro</th>
    <th>Estatus</th>
  </thead>
  <tbody>
    @foreach ($prestamos as $prestamo)
    <tr>
      @foreach ($usuarios as $usuario)
      @if($prestamo->id == $usuario->id)
        <td>{{$usuario->nombre}}</td>
        <td>{{$usuario->grado}}</td>
      @endif
      @endforeach
      @foreach($libros as $libro)
      @if($libro->id == $prestamo->idLibro)
      <td>{{$libro->titulo}}</td>
      <td>{{$prestamo->estatus}}</td>
      @endif
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection