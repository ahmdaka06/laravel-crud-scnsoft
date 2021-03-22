<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::resource('category','CategoryController');
Route::get('/website-settings', 'ConfigController@edit');
Route::put('/website-settings', 'ConfigController@update');