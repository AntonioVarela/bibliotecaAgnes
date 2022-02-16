@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col">
            <ul class="page-detalles">
                <li class="cover-page">
                    <div class="titulo-detalles">{{$libro->titulo}}
                    </div>
                    <span class="text-warning" style="padding-left: 40%">{{$libro->autor}}</span>
                </li>
                <li class="inside-page-detalles"></li>
                <li class="inside-page-detalles"></li>
                <li class="inside-page-detalles"></li>
                <li class="inside-page-detalles">
                    <div>Editorial: {{$libro->editorial}}
                        <br>
                        N° de edicion: {{$libro->NEdicion}}
                        <br>
                        Año: {{$libro->anio}}
                        <br>
                        ISBN: {{$libro->isbn}}
                        <br>
                        Codigo de barras: {{$libro->codigobarras}}
                        <br>
                        Idioma: {{$libro->idioma}}
                        <hr>
                        Notas: {{$libro->notas}}
                    </div>
                </li>
                <li class="inside-page-detalles"></li>
                <li class="inside-page-detalles"></li>
                <li class="end-page"></li>
            </ul>
        </div>
        <div class="col-1">
            @auth
                <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Prestar</button>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">INICIAR SESION</a>
            @endauth
            
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style=" position: absolute;">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Prestamo</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{route('prestamoPOST')}}" id="PrestamoPOST" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" value="{{$libro->id}}" hidden name="idLibro">
                        <label for="apellidoP" class="form-label">Usuario: </label>
                        <select name="idUsuario" id="idUsuari" class="form-select">
                            @foreach ($usuarios as $usuario)
                                <option value="{{$usuario->id}}">{{strtoupper ($usuario->nombre)}} ({{$usuario->grado}}) </option>
                            @endforeach
                        </select>                
                      </div>
                      <div class="mb-3">
                        <label for="fechaPrestamo" class="form-label">Fecha Prestamo</label>
                        <input type="date" class="form-control" id="fechaPrestamo" value="<?php echo date('Y-m-d'); ?>" name="fechaPrestamo" required>
                      </div>        
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
      </div>
@endsection