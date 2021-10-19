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
                <select class="form-control" id="tema" name="tema" aria-describedby="basic-addon3">
                    <option value="Español" {{$libro->tema == "Español"?'selected': ''}}>Español</option>
                    <option value="Matematicas" {{$libro->tema == "Matematicas"?'selected': ''}}>Matematicas</option>
                    <option value="Geografia" {{$libro->tema == "Geografia"?'selected': ''}}>Geografia</option>
                    <option value="Historia" {{$libro->tema == "Historia"?'selected': ''}}>Historia</option>
                    <option value="Literatura" {{$libro->tema == "Literatura"?'selected': ''}}>Literatura</option>
                    <option value="Gramatica" {{$libro->tema == "Gramatica"?'selected': ''}}>Gramatica</option>
                    <option value="Biologia" {{$libro->tema == "Biologia"?'selected': ''}}>Biologia</option>
                    <option value="Quimica" {{$libro->tema == "Quimica"?'selected': ''}}>Quimica</option>
                    <option value="Fisica" {{$libro->tema == "Fisica"?'selected': ''}}>Fisica</option>
                    <option value="Otro" {{$libro->tema == "Otro"?'selected': ''}}>Otro</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Idioma</span>
                <select class="form-control" id="idioma" name="idioma" aria-describedby="basic-addon3">
                    <option value="Español" {{$libro->idioma == "Español"?'selected': ''}}>Español</option>
                    <option value="Ingles"  {{$libro->idioma == "Ingles"?'selected': ''}}>Ingles</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Tipo</span>
                <select class="form-control" id="tipo" name="tipo" aria-describedby="basic-addon3">
                    <option value="Libro" {{$libro->tipo == "Libro"?'selected': ''}}>Libro</option>
                    <option value="Comic" {{$libro->tipo == "Comic"?'selected': ''}}>Comic</option>
                    <option value="Revista" {{$libro->tipo == "Revista"?'selected': ''}}>Revista</option>
                    <option value="Diccionario" {{$libro->tipo == "Diccionario"?'selected': ''}}>Diccionario</option>
                    <option value="Monografías" {{$libro->tipo == "Monografías"?'selected': ''}}>Monografías</option>
                    <option value="Recreativos" {{$libro->tipo == "Recreativos"?'selected': ''}}>Recreativos</option>
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
            <button type="submit" class="button-search">Guardar</button>
            <a href="{{ route('home') }}" class="button-search-cancelar">Cancelar</a>
        </div>
    </div>
</form>
</div>
@endsection
