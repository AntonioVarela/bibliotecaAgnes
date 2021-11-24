@extends('layouts.app')

@section('content')
<div class="container">
      <ul class="nav nav-tabs  nav-fill" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Libros mas prestados</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Niños con mas prestamos</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Libros no devueltos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="download-tab" data-bs-toggle="tab" data-bs-target="#download" type="button" role="tab" aria-controls="download" aria-selected="false">Catalogos</button>
          </li>
      </ul>
      <div class="tab-content m-3" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            @foreach ($librosMasPrestados as $item)
                @foreach ($libros as $libro)
                    @if($item->idLibro == $libro->id)
                    El libro <span class="resalta">{{$libro->titulo}}</span> presto <span class="resalta">{{$item->cuenta}}</span> veces;<br>
                    0 <progress id="file" max="{{$librosMasPrestados[0]->cuenta}}" value="{{$item->cuenta}}"> {{$item->cuenta}} </progress> {{$librosMasPrestados[0]->cuenta}}
                    <hr>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @foreach ($usuariosConMasPrestamos as $item)
                @foreach ($usuarios as $usuario)
                    @if($item->idUsuario == $usuario->id)
                    El usuario <span class="resalta">{{$usuario->nombre}} {{$usuario->apellidoP}} {{$usuario->apellidoM}}</span> tiene un total de <span class="resalta">{{$item->cuenta}}</span> libros prestados;<br>
                    0 <progress id="file" max="{{$usuariosConMasPrestamos[0]->cuenta}}" value="{{$item->cuenta}}"> {{$item->cuenta}} </progress> {{$usuariosConMasPrestamos[0]->cuenta}}
                    <hr>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            @foreach ($noDevueltos as $item)
            @foreach ($libros as $libro)
                @if($item->idLibro == $libro->id)
                @foreach ($usuarios as $item2)
                @if($item2->id == $item->idUsuario)
                El libro <span class="resalta">{{$libro->titulo}} </span> tiene fecha de entrega del <span class="resalta">{{$item->entrega}}</span> y no fue devuelto por <span class="resalta">{{$usuario->nombre}} {{$usuario->apellidoP}} {{$usuario->apellidoM}}</span><br> <hr>
                @endif
                @endforeach
                @endif
            @endforeach
        @endforeach
        </div>
        <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab">
            pdf <i class="fa fa-file-pdf" aria-hidden="true"></i>
            <br>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Catalogo de libros</button>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Catalogo de usuarios</button>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> usuarios Administradores</button>
           <hr>
           Excel <i class="fa fa-file-excel" aria-hidden="true"></i>
           <br>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Catalogo de libros</button>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Catalogo de usuarios</button>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> usuarios Administradores</button>
        </div>
      </div>

</div>
@endsection