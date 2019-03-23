<?php

Route::redirect('/','Inicio');

//Home
Route::get('Inicio','HomeController@index')->name('home');

//Login & Register
Auth::routes();
Route::get('/register/verify/{code}', 'GuestController@verify');
Route::get('Cuenta','UserController@cuenta')->name('cuenta');
Route::post('CuentaReset','UserController@CuentaReset')->name('CuentaReset');


//Publicist
Route::get('Perfil/{id}/','Publicist\PublicistController@perfil')->name('perfil');
Route::get('NuevoPerfil','Publicist\PublicistController@nuevo')->name('nuevoperfil');
Route::post('storePublicist','Publicist\PublicistController@storePublicist')->name('storePublicist');
Route::get('EditarPerfil/{id}/','Publicist\PublicistController@editar')->name('editarperfil');
Route::get('updatePerfil/{id}/','Publicist\PublicistController@updatePublicist')->name('updatePublicist');
Route::get('updateStatus/{id}/','Publicist\PublicistController@updateStatus')->name('updateStatus');

//Ratings
Route::post('storeRating','Publicist\RatingController@storeRating')->name('storeRating');

//Admin
Route::get('admin','Admin\AdminController@admin')->name('admin');
Route::get('userEdit/{id}/','UserController@userEdit')->name('userEdit');


//Notes
Route::get('NuevaNota','NoteController@nuevanota')->name('nuevanota');
Route::post('noteStore','NoteController@noteStore')->name('noteStore');
Route::get('EditarNota/{id}/','NoteController@EditarNota')->name('EditarNota');
Route::get('noteUpdate/{id}/','NoteController@noteUpdate')->name('noteUpdate');






