@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container bg-white p-4">
    <form action="{{route('passwordPost')}}" method="post">
    @csrf
        <label for="">Nueva Contraseña</label>
        <input type="text" name="password">
        <label for="">confirmar Contraseña</label>
        <input type="text" name="passwordConfirm">
        <button type="submit">enviar</button>
    </form>
</div>
@endsection