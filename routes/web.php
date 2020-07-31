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

// Route::get('/', "HomeController@home")->name('home');


// Route::get('/', 'CardsController@home')->name('home');


Route::get('/','CompanyController@index')->name('home');
Route::get('/','AdminController@index')->name('home');
Route::get('/home','CardsController@index')->name('home');
Route::post('/companies','CompanyController@store')->name('companies');
Route::get('/admin','AdminController@create')->name('admin');
Route::get('/cards','AdminController@login')->name('adminLogin');
Route::get('/cards/add','CardsController@create')->name('add');
Route::post('/cards','CardsController@store')->name('store');
Route::get('/cards/edit/{id}','CardsController@edit')->name('edit');
Route::get('/index','CardsController@view')->name('cards');
Route::post('/cards/{id}','CardsController@update')->name('save');
// Route::get('/cards/edit/cards/edit/{id}','CardsController@view');
Route::get('/cards/delete/{id}','CardsController@destroy');