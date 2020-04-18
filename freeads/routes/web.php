<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', 'IndexController@showIndex');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;

Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
Route::post('/edit/user/', 'UserController@update')->name('user.update'); 

Route::get('/edit/password/user/', 'UserController@passwordEdit')->name('password.edit');

Route::post('/edit/password/user/', 'UserController@passwordUpdate')->name('password.update'); 

Route::get('/annonce', 'AdController@create')->name('ad.create');
Route::post('/annonce/create', 'AdController@store')->name('ad.store');
Route::get('/annonces', 'AdController@showListe')->name('ad.showListe');
Route::post('/search', 'AdController@search')->name('ad.search');           