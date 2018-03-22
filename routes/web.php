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

Route::get('/', 'WelcomeController@welcome');

Route::group(['prefix' => 'adminis'], function(){
	Auth::routes();
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('categoria','CateController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('categoria/{id}/update','CateController@update');
  Route::get('categoria/{id}/delete','CateController@destroy');
  Route::delete('categoria/{id}/delete','CateController@destroy')->name('categoria.destroy');
  Route::get('categoria/{id}/deleteMsg','CateController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('subcategoria','SubCateController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('subcategoria/{id}/update','SubCateController@update');
  Route::delete('subcategoria/{id}/delete','SubCateController@destroy')->name('subcategoria.destroy');
  Route::get('subcategoria/{id}/delete','SubCateController@destroy');
  Route::get('subcategoria/{id}/deleteMsg','SubCateController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('producto','ProduController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('producto/{id}/update','ProduController@update');
  Route::delete('producto/{id}/delete','ProduController@destroy')->name('producto.destroy');
  Route::get('producto/{id}/deleteMsg','ProduController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('imagen','ImaController', ['only' => ['store', 'index', 'edit']]);
  Route::post('imagen/cargarGale', 'ImaController@cargarGaleria');
  Route::get('imagen/create/{id}', 'ImaController@create');
  Route::post('imagen/{id}/update','ImaController@update');
  Route::delete('imagen/{id}/delete','ImaController@destroy')->name('imagen.destroy');
  Route::get('imagen/{id}/deleteMsg','ImaController@DeleteMsg');
});

Route::post('enviar_correo', 'WelcomeController@enviarCorreo');

Route::get('/ajaxSucate/{id}', 'ProduController@ajaxSucate');

Route::get('/ajaxProdu/{id}', 'ProduController@ajaxProdu');

Route::get('/ajaxIma/{id}', 'ProduController@ajaxIma');

Route::get('producto/{id}', 'ProduController@show');

Route::get('subcategoria/{id}', 'SubCateController@show');

Route::get('categoria/{id}', 'CateController@show');

Route::get('/home', 'HomeController@index')->name('home');

