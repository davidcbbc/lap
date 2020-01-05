<?php



Route::get('/registo', 'UserController@registo');

Route::post('/registo', 'UserController@create');

Route::get('/', 'UserController@index');

Route::get('/login', 'UserController@loginPage');

Route::post('/login', 'UserController@login');

Route::get('/equipas/','EquipasController@index');

Route::get('/equipas/{id}','EquipasController@show');

Route::get('/users/{id}','UserController@show');

Route::get('/teste', "TestController@index");



