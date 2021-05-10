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
    return view('dashboard');
});
Route::get('/dashboard', 'Controller@dashboard');
Route::get('/categorylist', 'CategoryController@index');
Route::get('/addcategory', 'CategoryController@create');
Route::post('/addcategory', 'CategoryController@store');
Route::get('/editcategory/{category}', 'CategoryController@edit');
Route::post('/editcategory/{category}', 'CategoryController@update');
Route::delete('/deletecategory/{category}', 'CategoryController@destroy');
