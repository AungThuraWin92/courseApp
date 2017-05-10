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

Route::resource('/', 'WelcomeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');

Route::resource('product', 'ProductController');

Route::resource('adminuser', 'AdminUserController');

Route::resource('credit', 'CreditController');

Route::resource('dashboard', 'DashboardController');

Route::get('productdetail/{id}', 'ProductDetailController@index');

Route::resource('cart', 'CartController');

Route::get('sendmail', 'SendMailController@sendMail');

Route::resource('AccountActivate', 'AccountActivateController');
