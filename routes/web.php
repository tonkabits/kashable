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

Route::get('grid',function() {
    return view('grid');

});

Route::get('canvas', function ()
{
    return view('canvas');
});

Route::get('fields' , function(){
    return view('fields');
});


// show all tables
Route::get('tables' , function ()
{
    return view('tables');
});

// select a table
Route::get('tables/{id}', 'PosController@pickTable')->name('pickTable');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
