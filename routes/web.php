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

Auth::routes();

Route::get('/', 'ProjectController@index');
Route::prefix('projects')->group(function () {
    Route::get('', 'ProjectController@index')->name('project.index');
    Route::get('create', 'ProjectController@create')->name('project.create');
    Route::post('', 'ProjectController@store')->name('project.store');
    Route::get('{id}', 'ProjectController@show')->name('project.show');
    Route::get('{id}/edit', 'ProjectController@edit')->name('project.edit');
    Route::put('{id}', 'ProjectController@update')->name('project.update');
    Route::delete('{id}', 'ProjectController@destroy')->name('project.destroy');
});

Route::prefix('products')->group(function () {
    Route::get('', 'ProductController@index')->name('product.index');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('', 'ProductController@store')->name('product.store');
    Route::get('{id}', 'ProductController@show')->name('product.show');
    Route::get('{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::put('{id}', 'ProductController@update')->name('product.update');
    Route::delete('{id}', 'ProductController@destroy')->name('product.destroy');
});


Route::prefix('categories')->group(function () {
    Route::get('', 'CategoryController@index')->name('category.index');
    Route::get('create', 'CategoryController@create')->name('category.create');
    Route::post('', 'CategoryController@store')->name('category.store');
    Route::get('{id}', 'CategoryController@show')->name('category.show');
    Route::get('{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::put('{id}', 'CategoryController@update')->name('category.update');
    Route::delete('{id}', 'CategoryController@destroy')->name('category.destroy');
});
