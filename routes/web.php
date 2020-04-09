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

// Route::get('/city/index', function () {
//     return view('pages.admins.city.index');
// });

// CITY
Route::prefix('city')->group(function () {
    Route::get('/', 'Master\CityController@index')->name('city.index');
    Route::get('/create', 'Master\CityController@create')->name('city.create');
    Route::post('/create_submit', 'Master\CityController@create_submit')->name('city.create_submit');
    Route::get('/edit/{city_id}', 'Master\CityController@edit')->name('city.edit');
    Route::post('/update/{city_id}', 'Master\CityController@update')->name('city.update');
    Route::post('/destroy/{city_id}', "Master\CityController@destroy")->name('city.destroy');
});