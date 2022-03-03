@extends('layouts.app')

@section('content')
<div class="container bg-white">
<div class="row row-cols-1 row-cols-md-4 g-4">
@foreach ($libros as $libro)

<div class="row">
  <div class="col-7">
      {!!QrCode::size(110)->generate("http://biblioteca-agnes.herokuapp.com/buscaqr/" . $libro->id) !!}
  </div>
  <div class="col-5 justify-content-center" style="font-size: 20px; padding-top:40px">
    {{$libro->identificador}}
  </div>
</div>
@endforeach
</div>
{{ $libros->links() }}
</div>
@endsection