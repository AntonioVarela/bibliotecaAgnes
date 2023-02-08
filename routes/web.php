<?php

use App\Http\Controllers\adminitradorController;
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

Route::get('/','adminitradorController@principal')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/captura', 'adminitradorController@captura')->middleware('auth')->name('captura');
Route::get('/prestamos', 'adminitradorController@prestamos')->middleware('auth')->name('prestamos');
Route::get('/informes', 'adminitradorController@informesGET')->middleware('auth')->name('informes');
Route::get('/devuelve/{id}', 'adminitradorController@devuelveGET')->middleware('auth')->name('devuelve');
Route::get('/devuelveranking/{id}', 'adminitradorController@devuelveRanking')->middleware('auth')->name('devuelveranking');
Route::POST('/prestamoPOST', 'adminitradorController@prestamoPOST')->middleware('auth')->name('prestamoPOST');
Route::POST('/guarda', 'adminitradorController@capturaPOST')->middleware('auth')->name('guarda');
Route::POST('/eliminaLibro/{id}', 'adminitradorController@eliminaLibro')->middleware('auth')->name('eliminaLibro');
Route::POST('/guardaModificacionLibro/{id}', 'adminitradorController@modificaLibroPOST')->middleware('auth')->name('modificaLibro');
Route::get('/modificarlibro/{id}', 'adminitradorController@modificaGET')->middleware('auth')->name('modificarlibro');
Route::post('/buscar','adminitradorController@buscarLibro')->name('buscar');
Route::post('/buscardetalles','adminitradorController@buscarLibroDetalles')->name('buscarDetalles');
Route::post('/filtraPorNumeros','adminitradorController@filtraPorNumeros')->name('filtraPorNumeros');
Route::post('/buscarPrestamo','adminitradorController@buscarPrestamo')->name('buscarPrestamo');
Route::post('/duplicar','adminitradorController@duplicar')->name("duplicar");
Route::get('/etiquetas','adminitradorController@etiquetas')->middleware('auth')->name('etiquetas');
Route::get('/altadeusuarios','adminitradorController@altadeusuarios')->middleware('auth')->name('altadeusuarios');
Route::post('/subiralumnos','adminitradorController@subiralumnos')->name("subiralumnos");
Route::post('/prueba','adminitradorController@leercodigoqr')->name("prueba");
Route::get('/buscaqr/{id}','adminitradorController@buscaqr')->name('buscaqr')->middleware('auth');
Route::get('/reservacion','adminitradorController@inicioreservacion')->name('reservacion')->middleware('auth');
Route::post('/reservacionPost','adminitradorController@reservacionPost')->name('reservacionpost')->middleware('auth');
Route::post('/reservacionpostotro','adminitradorController@reservacionPostotro')->name('reservacionpostotro')->middleware('auth');
Route::get('/password', 'adminitradorController@passwordGET')->name("password");
Route::post('/passwordPost', 'adminitradorController@passwordPOST')->name("passwordPost");

Route::get('/prestamosfast','adminitradorController@prestamosFast')->name('prestamosFast')->middleware('auth');
Route::get('/renuevaLibro/{id}','adminitradorController@renuevaLibro')->name('renuevaLibro')->middleware('auth');