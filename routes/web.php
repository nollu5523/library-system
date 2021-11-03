<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Author;
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




//Login routes
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get('/index','App\Http\Controllers\Controller@index');
Route::get('login/successlogin', 'App\Http\Controllers\LoginController@successlogin');
Route::post('/login/checklogin','App\Http\Controllers\LoginController@checklogin');
Route::get('/login/logout','App\Http\Controllers\LoginController@logout');


//Register routes
Route::get('/register','App\Http\Controllers\RegisterController@index');
Route::post('/register/register','App\Http\Controllers\RegisterController@register');


//Book routes
Route::get('/book','App\Http\Controllers\SearchEngine@allBooksWithCategories');
Route::get('/bookResults', 'App\Http\Controllers\SearchEngine@findBook');
Route::get('/bookAdd','App\Http\Controllers\BookController@index');
Route::post('/bookAdd','App\Http\Controllers\BookController@add');
Route::get('/details/{title}', ['uses' => 'App\Http\Controllers\BookController@details', 'as' => 'details']);
Route::get('/categoryFilter/{id}',[ 'uses' => 'App\Http\Controllers\SearchEngine@categoryFilter', 'as'=>'categoryFilter']);
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


//Author routes


Route::get('/authorAdd', 'App\Http\Controllers\AuthorController@index');
//Route::get('/authorBooks', 'App\Http\Controllers\SearchEngine@authorBooks');
Route::post('/updateAuthor', [
'uses' => 'App\Http\Controllers\AuthorController@update',
'as' => 'updateAuthor'
]);
Route::post('/authorAdd', 'App\Http\Controllers\AuthorController@add');

Route::get('/authorBooks/{id}',[
'uses' =>'App\Http\Controllers\SearchEngine@authorBooks',
'as' => 'authorBooks'
]);

Route::get('/deleteAuthor/{id}', [
'uses' => 'App\Http\Controllers\AuthorController@delete',
'as' => 'deleteAuthor'
]);
Route::get('/editAuthor/{id}', [
'uses' => 'App\Http\Controllers\AuthorController@edit',
'as' => 'editAuthor'
]);





//Category routes
Route::get('/categoryAdd', 'App\Http\Controllers\CategoryController@index');
Route::post('/categoryAdd', 'App\Http\Controllers\CategoryController@add');
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


//Publishing routes
Route::get('/publishingAdd', 'App\Http\Controllers\PublishingController@index');
Route::post('/publishingAdd', 'App\Http\Controllers\PublishingController@add');
Route::get('/publishingAdd', 'App\Http\Controllers\PublishingController@index');
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


//Rent routes
Route::get('/rents','App\Http\Controllers\RentController@index');
Route::get('/booked','App\Http\Controllers\RentController@showBooked');
Route::get('/rented','App\Http\Controllers\RentController@showRented');
Route::get('/returned', 'App\Http\Controllers\RentController@showReturned');
Route::get('/find','App\Http\Controllers\RentController@findPerson');
Route::get('/booking/{id}',[
'uses' => 'App\Http\Controllers\RentController@booking',
'as' => 'booking'
]);
Route::get('/rent/{id}',[
'uses' => 'App\Http\Controllers\RentController@rent',
'as' => 'rent'
]);
Route::get('/showRents','App\Http\Controllers\RentController@showRents');
Route::get('/showRent/{id}',[
'uses' => 'App\Http\Controllers\RentController@showRent',
'as' => 'showRent'
]);
Route::get('/return/{id}',[
'uses' => 'App\Http\Controllers\RentController@return',
'as' => 'return',
]);





