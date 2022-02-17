@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="margin:10px 0px;">
        <h2>Resultados de {{$buscar}}</h2>
        <div class="d-flex justify-content-end"><a href="{{route("prestamos")}}">Volver</a></div>
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
                    @if ($item->entrega <= DATE('Y-m-d') && $item->estatus != "Devuelto")
                      <button type="button" class=" mt-3 list-group-item list-group-item-action text-danger" title="devolver" onclick="confirmarEntrega({{$item->id}})"><i class="fa-solid fa-hand-holding fa-lg"></i> {{$libro->titulo}}
                        <br>Fecha de entrega: {{$item->entrega}}</button>
                      @else
                      @if ($item->estatus == "Prestado")
                      <button type="button" class="mt-3 list-group-item list-group-item-action  text-success" title="devolver" onclick="confirmarEntrega({{$item->id}})"><i class="fa-solid fa-hand-holding fa-lg"></i> {{$libro->titulo}} 
                        <br>Fecha de entrega: {{$item->entrega}}</button>
                      @else
                      <button type="button" class="mt-3 list-group-item list-group-item-action" disabled><i class="fa-solid fa-hand-holding fa-lg"></i> {{$libro->titulo}}</button>
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
</div>
@endsection