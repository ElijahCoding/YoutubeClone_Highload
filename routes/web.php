<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('channels', 'ChannelController');
Route::resource('channels/{channel}/subscriptions', 'SubscriptionController')->only(['store', 'destroy']);
