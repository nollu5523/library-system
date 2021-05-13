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

Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get('/index','App\Http\Controllers\Controller@index');
Route::get('login/successlogin', 'App\Http\Controllers\LoginController@successlogin');
Route::post('/login/checklogin','App\Http\Controllers\LoginController@checklogin');
Route::get('/login/logout','App\Http\Controllers\LoginController@logout');
Route::get('/register','App\Http\Controllers\RegisterController@index');
Route::post('/register/register','App\Http\Controllers\RegisterController@register');
Route::get('/book','App\Http\Controllers\SearchEngine@allBooksWithCategories');
Route::get('/bookResults', 'App\Http\Controllers\SearchEngine@findBook');
Route::get('/bookAdd','App\Http\Controllers\BookController@index');
Route::post('/bookAdd','App\Http\Controllers\BookController@add');
Route::get('/categoryFilter','App\Http\Controllers\SearchEngine@categoryFilter');
Route::get('/author', 'App\Http\Controllers\SearchEngine@authorAllBooks');
Route::get('/authorAdd', 'App\Http\Controllers\AuthorController@index');
Route::get('/categoryAdd', 'App\Http\Controllers\CategoryController@index');
Route::post('/categoryAdd', 'App\Http\Controllers\CategoryController@add');
Route::get('/publishingAdd', 'App\Http\Controllers\PublishingController@index');
Route::post('/publishingAdd', 'App\Http\Controllers\PublishingController@add');

Route::get('/publishingAdd', 'App\Http\Controllers\PublishingController@index');
Route::post('/authorAdd', 'App\Http\Controllers\AuthorController@add');

Route::get('/delete/{id}', [
'uses' => 'App\Http\Controllers\BookController@delete',
'as' => 'delete'
]);
Route::get('/edit/{id}', [
'uses' => 'App\Http\Controllers\BookController@edit',
'as' => 'edit'
]);
Route::post('/update', [
'uses' => 'App\Http\Controllers\BookController@update',
'as' => 'update'
]);

Route::get('/deleteAuthor/{id}', [
'uses' => 'App\Http\Controllers\AuthorController@delete',
'as' => 'deleteAuthor'
]);
Route::get('/editAuthor/{id}', [
'uses' => 'App\Http\Controllers\AuthorController@edit',
'as' => 'editAuthor'
]);
Route::post('/updateAuthor', [
'uses' => 'App\Http\Controllers\AuthorController@update',
'as' => 'updateAuthor'
]);

Route::get('/deleteCategory/{id}', [
'uses' => 'App\Http\Controllers\CategoryController@delete',
'as' => 'deleteCategory'
]);
Route::get('/editCategory/{id}', [
'uses' => 'App\Http\Controllers\CategoryController@edit',
'as' => 'editCategory'
]);
Route::post('/updateCategory', [
'uses' => 'App\Http\Controllers\CategoryController@update',
'as' => 'updateCategory'
]);

Route::get('/deletePublishing/{id}', [
'uses' => 'App\Http\Controllers\PublishingController@delete',
'as' => 'deletePublishing'
]);
Route::get('/editPublishing/{id}', [
'uses' => 'App\Http\Controllers\PublishingController@edit',
'as' => 'editPublishing'
]);
Route::post('/updatePublishing', [
'uses' => 'App\Http\Controllers\PublishingController@update',
'as' => 'updatePublishing'
]);