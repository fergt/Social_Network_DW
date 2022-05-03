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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/developers', function () {
    return view('developers');
});




Auth::routes();

// ruta_a_url, controlador -> nombre por donde se accede

Route::get('/home', 'HomeController@index')->name('home');


// Usuario

Route::get('/user/avatar/{filename?}', 'PagesController@getImage')->name('user.image');
Route::POST('/usuario/editarusuario', 'EditarUsuarioController@update')->name('usuario.editarusuario');
Route::get('/usuario/perfil/{id}', 'UsuariosController@profile')->name('usuario.miperfil');
Route::get('/usuario/editarusuario', 'PagesController@config')->name('usuario.editarusuario');

//todos los usuarios
//Route::get('/usuar', 'UsuariosController@index')->name('publicacion');


// facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebbok/callback', 'Auth\LoginController@handleProviderCallback');




//Route::post('/miperfil', 'UsuariosController@profile')->name('miperfil');
//Route::get('/userprofile', 'PagesController@config')->name('config');
//Route::get('/userprofile/{id}', 'PagesController@profile')->name('myprofile');
//Route::get('/home', 'UsuariosController@profile')->name('miperfil');


//pagineo
Route::get('/usuario', 'UsuariosController@index');
Route::get('/usuario/pagination', 'UsuariosController@pagination');


// publicaciones
Route::get('/publicacionesdos', 'PagesController@index')->name('Publicaciones.publicaci');


//Rutas de imagenes
Route::get('/image/create', 'ImagenController@create')->name('Publicaciones.crear');
Route::post('/image/store', 'ImagenController@store')->name('image.store');
Route::get('/image/get/{filename?}', 'ImagenController@getImage')->name('image.get');
Route::get('/image/show/{id}', 'ImagenController@show')->name('image.show');



Route::get('/image/delete/{id}', 'ImagenController@destroy')->name('image.delete');
Route::get('/image/edit/{id}', 'ImagenController@edit')->name('image.edit');
Route::post('/image/update', 'ImagenController@update')->name('image.update');
