<?php



Route::get('/', function () {
    return view('one');
 });

 Route::get('/login', function () {
    return view("login");
 });


Route::post('/login', function () {
    return request()->all();
});



Route::get('/teste', "TestController@index");



