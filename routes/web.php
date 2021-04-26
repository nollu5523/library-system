<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;

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
    return view('index');
});

Route::get('/welcome', 'App\Http\Controllers\LoginController@welcome');
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get('login/successlogin', 'App\Http\Controllers\LoginController@successlogin');
Route::get('/successlogin', 'App\Http\Controllers\LoginController@successlogin');
Route::post('/login/checklogin','App\Http\Controllers\LoginController@checklogin');
Route::get('/login/logout','App\Http\Controllers\LoginController@logout');
Route::get('/register','App\Http\Controllers\RegisterController@index');
Route::post('/register/register','App\Http\Controllers\RegisterController@register');
Route::get('/book','App\Http\Controllers\SearchEngine@allBooksWithCategories');
Route::get('/bookResults', 'App\Http\Controllers\SearchEngine@findBook');
