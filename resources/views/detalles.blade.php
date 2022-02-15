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
                <li class="inside-page-detalles">
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
                <li class="inside-page-detalles">
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
                <li class="inside-page-detalles">
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
                <li class="inside-page-detalles">
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
                <li class="inside-page-detalles">
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
    </div>
@endsection