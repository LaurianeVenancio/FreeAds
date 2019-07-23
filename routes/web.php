<?php

Route::get('/', 'IndexController@showIndex')->name('index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('profile', 'UserController', [
        'only' => ['show', 'edit', 'update', 'destroy'],
        'parameters' => ['profile' => 'user']
    ]);
});

Route::get('/annonce/{id}/edit', 'AnnonceController@edit');
Route::post('annonce/{id}/update', 'AnnonceController@update');
Route::resource('annonce', 'AnnonceController', [
        'parameters' => ['annonce' => 'annonce']
]);
