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
Route::get('/', 'IndexController@showIndex');
Route::get('/', 'InscriptionController@formulaire');
Route::post('/inscription', 'InscriptionController@traitement');
Route::get('/', 'ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');


// Route::get('/inscription', function () {
//     return view('inscription');
// });
// Route::post('/inscription', function () {
//     return 'Le Formulaire est bien reçu !';
// });
// // Route::post('/inscription', function () {
// //     return 'Votre email est ' . $_POST['email'];
// // });
// Route::post('/inscription', function () {
//     return 'Votre email est ' . request('email');
// });