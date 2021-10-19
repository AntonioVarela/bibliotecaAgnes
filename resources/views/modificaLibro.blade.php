@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #00000085; padding:3% 7%;">
    <form action="{{route('modificaLibro', ['id' => $libro->id])}}" method="post">
        @csrf
    <div class="row justify-content-center text-center text-white">
        <h2>Modificar Libro</h2>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Titulo</span>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{$libro->titulo =! '' ? $libro->titulo : ''}}" aria-describedby="basic-addon3" required>
            </div>  
        </div>
              <div class="col-6">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Identificador</span>
                    <input type="text" class="form-control" id="identificador" name="identificador" value="{{$libro->identificador =! '' ? $libro->identificador : ''}}" required aria-describedby="basic-addon3">
                </div>  
              </div>        
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Autor</span>
                <input type="text" class="form-control" id="autor" name="autor" value="{{$libro->autor =! '' ? $libro->autor:""}}" aria-describedby="basic-addon3">
                
            </div>
        </div>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Autor 2</span>
                <input type="text" class="form-control" id="autor2" name="autor2" value="{{$libro->autor2 =! '' ? $libro->autor2 : ""}}" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Editorial</span>
                <input type="text" class="form-control" id="editorial" name="editorial" value="{{$libro->editorial =! '' ? $libro->editorial : ""}}" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">N° Edicion</span>
                <input type="text" class="form-control" id="NEdicion" name="NEdicion" value="{{$libro->NEdicion =! '' ? $libro->NEdicion : ""}}" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-2">
            <label for="">foto</label>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Codigo de Barras</span>
                <input type="text" class="form-control" id="codigobarras" name="codigobarras" value="{{$libro->codigobarras =! '' ? $libro->codigobarras : ""}}" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">ISBN</span>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{$libro->isbn =! '' ? $libro->isbn : ""}}" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Tema</span>
                <select class="form-control" id="tema" name="tema" value="{{$libro->tema =! '' ? $libro->tema : ""}}" aria-describedby="basic-addon3">
                    <option value="ninguno">Ninguno</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Idioma</span>
                <select class="form-control" id="idioma" name="idioma" value="{{$libro->idioma =! '' ? $libro->idioma : ""}}" aria-describedby="basic-addon3">
                    <option value="Español">Español</option>
                    <option value="ingles">Ingles</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Tipo</span>
                <select class="form-control" id="tipo" name="tipo" value="{{$libro->tipo =! '' ? $libro->tipo : ""}}" aria-describedby="basic-addon3">
                    <option value="libro">Libro</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Año</span>
                <input type="text" class="form-control" id="anio" name="anio" value="{{$libro->anio =! '' ? $libro->anio : ""}}" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Notas</span>
                <textarea class="form-control" id="notas" name="notas" aria-describedby="basic-addon3">{{$libro->notas =! '' ? $libro->notas : ""}}
                </textarea>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
</div>
@endsection
