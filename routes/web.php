<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('prueba');
});
//Route::get('/Probando', 'HomeController@prueba')->name('prueba');
Auth::routes();

Route::get('/cursos','HomeController@indexcurso')->name('cursos.index');

//Route::get('/cursos/registrar','HomeController@createCurso')->name('cursos.crear');

//Route::get('/cursos/registrar-prelacion','HomeController@registerPrelation')->name('cursos.crear.prelacion');

Route::post('/cursos/registrar-prelacion/{id}','HomeController@buscar')->name('buscar-prelacion');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




