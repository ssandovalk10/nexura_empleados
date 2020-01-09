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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('empleados', 'EmpleadosController');


Route::get('imports', [
		'as' => 'imports',
		'uses' => 'ImportsController@index'
	]);


Route::get('import/csv', 'ImportsController@csv');
Route::get('import/blacklist', 'ImportsController@blacklist');
Route::post('upload', 'ImportsController@upload');
Route::post('blacklist', 'ImportsController@Importblacklist');


Route::get('resultados', [
		'as' => 'resultados',
		'uses' => 'ReportesController@index'
	]);

Route::get('export/csv', 'ReportesController@exportcsv');
Route::get('limpiar', 'ReportesController@limpiar' );




