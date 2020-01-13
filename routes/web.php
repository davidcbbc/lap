<?php




Route::get('/', 'GuestController@index');

Route::get('/equipas/','EquipasController@index');

Route::get('/equipas/{id}','EquipasController@show');

Route::get('/users/{id}','UserController@show');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/equipa/create','EquipasController@create')->middleware('auth','noEquipa','verified');

Route::post('/equipa/create','EquipasController@add')->middleware('auth','noEquipa','verified');

Route::post('/equipa/aceitar','EquipasController@aceitar')->middleware('auth','noEquipa','verified');

Route::get('/notificacoes','ConviteController@show')->middleware('verified');

Route::get('/convidar','CapitaoController@show');

Route::post('/convidar','CapitaoController@convidar');

Route::get('/definicoes','UserController@edit')->middleware('verified');

Route::post('/definicoes','UserController@editar')->middleware('verified');

Route::get('/torneios','TorneioController@show');

