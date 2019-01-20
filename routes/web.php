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

Route::get('/', function (){
    return view('template.app');
});

Route::group(['prefix' => 'pessoas'], function(){
    Route::get('/', function (){
        return redirect('/pessoas/A');
    });
    Route::get('/new', 'PessoasController@new');
    Route::post('/create', 'PessoasController@create');
    Route::get('/edit/{id}', 'PessoasController@edit');
    Route::post('/update', 'PessoasController@update');
    Route::get('/remove/{id}', 'PessoasController@remove');
    Route::post('/delete', 'PessoasController@delete');
    Route::post('/filter', 'PessoasController@filter');
    Route::get('/{letra}', 'PessoasController@index');
});