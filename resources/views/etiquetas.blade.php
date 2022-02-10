@extends('layouts.app')

@section('content')
<div class="container bg-white">
<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach ($libros as $libro)
    <div class="col">
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    {!!QrCode::size(100)->generate($libro->id) !!}
                </div>
                <div class="col-8 pt-2" style="font-size: 1vw; text-transform: uppercase;"><strong>Titulo: </strong>{{$libro->titulo}}<strong> 
                    <br> Posicion: </strong>{{$libro->identificador}}</div>
            </div>
        </div>
      </div>
    </div>
@endforeach
</div>
</div>
@endsection