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
    return view('guest/home');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->middleware('auth')->name('admin.home');
Route::post('/admin', 'HomeController@store')->name('admin.store');
Route::post('/')->name('guest.home');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('contacts', 'ContactController');
    Route::resource('lessons', 'LessonController');

    Route::get('/{any}', function(){ 
        abort('404');
    })->where('any', '.*');
});
