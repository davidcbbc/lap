<?php


use Illuminate\Support\Facades\Auth;

Route::get('/admin', 'AdminController@index')->middleware('auth', 'admin');

Route::get('/admin/equipas', 'AdminController@equipas')->middleware('auth', 'admin');

Route::get('/admin/torneios', 'AdminController@torneios')->middleware('auth', 'admin');

Route::get('/admin/criar/torneio', 'AdminController@criarTorneioView')->middleware('auth', 'admin');

Route::post('/admin/criar/torneio', 'AdminController@criarTorneio')->middleware('auth', 'admin');

Route::get('/admin/equipas/ver/{equipa}', 'AdminController@verEquipa')->middleware('auth', 'admin');

Route::get('/admin/torneios/ver/{torneio}', 'AdminController@verTorneio')->middleware('auth', 'admin');

Route::get('/admin/enviar/notificacao/equipa', 'AdminController@criarNotificacaoEquipa')->middleware('auth', 'admin');

Route::get('/admin/enviar/notificacao/jogador', 'AdminController@criarNotificacaoJogador')->middleware('auth', 'admin');

Route::get('/admin/enviar/notificacao/todos', 'AdminController@criarNotificacaoTodos')->middleware('auth', 'admin');

Route::get('/admin/notificacoes', 'AdminController@notificacoes')->middleware('auth', 'admin');


Route::POST('admin/enviar/notificacao', 'AdminController@enviarNotificacao')->middleware('auth', 'admin');

Route::get('/', 'GuestController@index');

Route::get('/equipas', 'EquipasController@index');

Route::get('/users','UserController@showAll');

Route::get('/users/search','UserController@search');

Route::get('/equipas/search', 'EquipasController@search');

Route::get('/equipas/{id}', 'EquipasController@show');

Route::get('/users/{id}', 'UserController@show');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/equipa/create', 'EquipasController@create')->middleware('auth', 'noEquipa', 'verified');

Route::post('/equipa/create', 'EquipasController@add')->middleware('auth', 'noEquipa', 'verified');

Route::post('/equipa/aceitar', 'EquipasController@aceitar')->middleware('auth', 'noEquipa', 'verified');

Route::post('/notificacoes/visto', 'UserController@readNotification')->middleware('verified');

Route::get('/notificacoes', 'ConviteController@show')->middleware('auth','verified');

Route::get('/notificacoes/lidas', 'ConviteController@showRead')->middleware('auth','verified');

Route::get('/convidar', 'CapitaoController@show');

Route::post('/convidar', 'CapitaoController@convidar');

Route::get('/definicoes', 'UserController@edit')->middleware('verified');

Route::post('/definicoes', 'UserController@editar')->middleware('verified');

Route::post('/definicoes/sair', 'UserController@sair')->middleware('verified');

Route::get('/torneio/{id}', 'TorneioController@show');

Route::post('/torneio/registar', 'TorneioController@registarEquipa');

Route::get('/torneio/ver', 'TorneioController@ver');

Route::get('/password/forget','ResetPasswordController@show');

Route::post('/password/reset','ResetPasswordController@validatePasswordRequest');

Route::post('/password/reset/token','ResetPasswordController@resetPassword');