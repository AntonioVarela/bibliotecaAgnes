@extends('layouts.app')

@section('content')
<div class="container bg-pan-left" style="background-color: #00000085; padding:3% 7%; box-shadow: black 5px 7px 12px;">
    <form action="guarda" method="post">
        @csrf
    <div class="row justify-content-center text-center text-white">
        <h2>Agregar Libro</h2>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Titulo <span class="text-danger">*</span></span>
                <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="basic-addon3" required>
            </div>  
        </div>
              <div class="col-6">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Identificador <span class="text-danger">*</span></span>
                    <input type="text" class="form-control" id="identificador" name="identificador" value="{{$cuenta+1}}" required aria-describedby="basic-addon3">
                </div>  
              </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Autor <span class="text-danger">*</span></span>
                <input type="text" class="form-control" id="autor" name="autor" required  aria-describedby="basic-addon3">
                
            </div>
        </div>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Autor 2</span>
                <input type="text" class="form-control" id="autor2" name="autor2"  aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Editorial</span>
                <input type="text" class="form-control" id="editorial" name="editorial" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">N° Edicion</span>
                <input type="text" class="form-control" id="NEdicion" name="NEdicion" aria-describedby="basic-addon3">
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
                <input type="text" class="form-control" id="codigobarras" name="codigobarras" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">ISBN</span>
                <input type="text" class="form-control" id="isbn" name="isbn" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Tema</span>
                <select class="form-select" id="tema" name="tema" aria-describedby="basic-addon3">
                    <option value="Español">Español</option>
                    <option value="Matematicas">Matematicas</option>
                    <option value="Geografia">Geografia</option>
                    <option value="Historia">Historia</option>
                    <option value="Literatura">Literatura</option>
                    <option value="Gramatica">Gramatica</option>
                    <option value="Biologia">Biologia</option>
                    <option value="Quimica">Quimica</option>
                    <option value="Fisica">Fisica</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Idioma</span>
                <select class="form-select" id="idioma" name="idioma" aria-describedby="basic-addon3">
                    <option value="Español">Español</option>
                    <option value="ingles">Ingles</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Tipo</span>
                <select class="form-select" id="tipo" name="tipo"  aria-describedby="basic-addon3">
                    <option value="Libro">Libro</option>
                    <option value="Comic">Comic</option>
                    <option value="Revista">Revista</option>
                    <option value="Diccionario">Diccionario</option>
                    <option value="Monografías">Monografías</option>
                    <option value="Recreativos">Recreativos</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Año</span>
                <input type="text" class="form-control" id="anio" name="anio" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Notas</span>
                <textarea class="form-control" id="notas" name="notas" aria-describedby="basic-addon3">
                </textarea>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-3">
            <button type="submit" class="button-search">Guardar</button>
            <a href="{{route('home')}}" class="button-search-cancelar">Cancelar</a>
        </div>
    </div>
</form>
</div>
@endsection
