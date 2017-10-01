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

Route::get('/send', 'HomeController@send')->name('send');
Route::post('/send', 'HomeController@receiveEmail')->name('receive');

// Route::get('/broadcast', function() {
//     event(new TestEvent('Broadcasting in Laravel using Pusher!'));

//     return view('welcome');
// });