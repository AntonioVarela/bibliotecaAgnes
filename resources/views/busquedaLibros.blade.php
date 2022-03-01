@extends('layouts.app')

@section('content')
<div class="p-4">
<h2>Resultados de {{$buscar}}</h2>
    <div class="row">
        @foreach ($libros as $libro)
        <div class="col-3">
            <ul class="page">
                <li class="cover-page">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill fs-6 bg-danger">
                        {{$libro->identificador}}
                    </span>
                    <div class="text-white pt-2 fs-6 pr-1" style="text-transform:capitalize;">{{$libro->titulo}}
                    </div>
                    <span class="text-warning fs-7">{{$libro->autor}}</span>
                <li class="inside-page">
                    <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                </li>
                <li class="inside-page">
                    <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                </li>
                <li class="inside-page">
                    <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                </li>
                <li class="inside-page">
                    <span style="font-size:80%;">
                        Editorial: {{$libro->editorial}}
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
                    </span>
                    
                    @auth
                    <button class="btn-sm btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample{{$libro->id}}" aria-controls="offcanvasExample">Prestar</button>
                    @endauth
                </li>
                <li class="inside-page">
                    <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                </li>
                <li class="inside-page">
                    <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                </li>
                <li class="end-page"></li>
            </ul>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample{{$libro->id}}" aria-labelledby="offcanvasExampleLabel">
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
                            <select name="idUsuario" id="idLibroDetalles" class="form-select">
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
        @endforeach
    </div>
</div>
@endsection