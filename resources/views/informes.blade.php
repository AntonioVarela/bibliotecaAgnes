@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Estadisticas de la biblioteca</h2>
<h4>Total de libros registrados: <strong style="color: #0d8ee9;">{{$totalLibros}}</strong></h4>
<h4>Total de libros prestados actualmente: <strong style="color: #0d8ee9;">{{$librosPrestados}}</strong></h4>
<h4>Total prestamos vencidos actualmente: <strong style="color: #0d8ee9;">{{$vencidos}}</strong></h4>
<h4>Total de libros perdidos: <strong style="color: #0d8ee9;">{{$librosPerdidos->count()}}</strong></h4>
<h4>Ultimo identificador registrado: <strong style="color: #0d8ee9;">{{$ultimoDisponible}}</strong></h4>
<div class="row mt-4">
  <div class="col">
    <h5>Identificadores repetidos</h5>
    <table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Identificador</th>
            <th scope="col">Cantidad</th>
        </tr>
    </thead>
    <tbody>
      @foreach($librosRepetidos as $item)
      @if($item->cuenta > 1)
        <tr>
            <th scope="row">{{$item->identificador}}</th>
            <td>{{$item->cuenta}}</td>
        </tr>
        @endif
      @endforeach
    </tbody>
</table>
  </div>
  <div class="col">
  <h5>Identificadores disponibles</h5>
  <table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Identificador</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 1; $i <$libros->count(); $i++)
        @if($libros->where('identificador', $i)->count() == 0)  
        <tr>
            <th scope="row">{{$i}}</th>
        </tr>
        @endif
      @endfor
    </tbody>
</table>

  </div>
  <div class="col">
  <!-- <h5>Libros perdidos</h5>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Identificador</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($librosPerdidos as $item)
            <tr>
                <th scope="row">{{$item->identificador}}</th>
                <td>{{$item->titulo}}</td>
            </tr>
          @endforeach
        </tbody>
    </table> -->
  </div>
</div>
</div>

@endsection