@extends('layouts.app')

@section('content')
<div class="container bg-white p-4">
    <form action="{{route('subiralumnos')}}" method="post">
        @csrf
        <textarea name="alumnos" id="alumnos" cols="30" rows="10"></textarea>
        <select name="grado" id="grado">
            <option>1°A</option>
            <option>1°B</option>
            <option>1°C</option>
            <option>2°A</option>
            <option>2°B</option>
            <option>2°C</option>
            <option>3°A</option>
            <option>3°B</option>
            <option>3°C</option>
            <option>4°A</option>
            <option>4°B</option>
            <option>4°C</option>
            <option>5°A</option>
            <option>5°B</option>
            <option>5°C</option>
            <option>6°A</option>
            <option>6°B</option>
            <option>6°C</option>
            <option>1°A S</option>
            <option>1°B S</option>
            <option>2°A S</option>
            <option>2°B S</option>
            <option>3°A S</option>
            <option>3°B S</option>
        </select>
        <hr>
        <button type="submit">enviar</button>
    </form>
</div>
@endsection