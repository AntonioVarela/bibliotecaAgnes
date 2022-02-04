<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/captura', 'adminitradorController@captura')->middleware('auth')->name('captura');
Route::get('/prestamos', 'adminitradorController@prestamos')->middleware('auth')->name('prestamos');
Route::get('/usuarios', 'adminitradorController@usuarios')->middleware('auth')->name('usuarios');
Route::get('/informes', 'adminitradorController@informesGET')->middleware('auth')->name('informes');
Route::get('/devuelve/{id}', 'adminitradorController@devuelveGET')->middleware('auth')->name('devuelve');
Route::POST('/usuariosPOST', 'adminitradorController@usuariosPOST')->middleware('auth')->name('usuarioPOST');
Route::POST('/prestamoPOST', 'adminitradorController@prestamoPOST')->middleware('auth')->name('prestamoPOST');
Route::POST('/guarda', 'adminitradorController@capturaPOST')->middleware('auth')->name('guarda');
Route::POST('/eliminaLibro/{id}', 'adminitradorController@eliminaLibro')->middleware('auth')->name('eliminaLibro');
Route::POST('/guardaModificacionLibro/{id}', 'adminitradorController@modificaLibroPOST')->middleware('auth')->name('modificaLibro');
Route::get('/modificarlibro/{id}', 'adminitradorController@modificaGET')->middleware('auth')->name('modificarlibro');
Route::post('/buscar','adminitradorController@buscarLibro')->name('buscar');
Route::post('/buscarPrestamo','adminitradorController@buscarPrestamo')->name('buscarPrestamo');
Route::post('/duplicar','adminitradorController@duplicar')->name("duplicar");