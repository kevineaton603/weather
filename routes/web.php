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

/**
 * Routes can be closures that return raw HTML
 */
Route::get('/example', function() {
    return "<h1>This is an example</h1>";
});

/**
 * Routes can be closures that return views
 */
Route::get('/about', function () {
    return view('pages.about');
});

/**
 * Most Commonly routes return a function from
 * a controller class that keeps track of the logic
 * of the application.
 */
Route::get('/', 'PagesController@index');

Route::get('/cookie/set', 'CookieController@setCookie');
Route::get('/cookie/get', 'CookieController@getCookie');
