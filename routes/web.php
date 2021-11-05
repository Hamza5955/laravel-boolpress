<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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

/* Rotta che gestisce la homepage visibile agli utenti */
Route::get('/', 'HomeController@index')->name('index');

/* Serie di rotte che gestiscono il meccanismo di autenticazione */
Auth::routes();
// Route::get('/admin', 'HomeController@index')->name('admin');
/* Serie di rotte che gestiscono il backoffice */
Route::middleware('auth')->prefix("admin")->namespace('Admin')->name("admin.")
->group(function(){
    //pagina di atterraggio dopo il login
    Route::get('/', 'HomeController@index')->name('index');

    Route::resource('/posts', 'PostController');
});
