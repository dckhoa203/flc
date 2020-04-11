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

// DISTRICT
Route::prefix('district')->group(function () {
    Route::get('/', 'Master\DistrictController@index')->name('district.index');
    Route::get('/create', 'Master\DistrictController@create')->name('district.create');
    Route::post('/create_submit', 'Master\DistrictController@create_submit')->name('district.create_submit');
    Route::get('/edit/{district_id}', 'Master\DistrictController@edit')->name('district.edit');
    Route::post('/update/{district_id}', 'Master\DistrictController@update')->name('district.update');
    Route::post('/destroy/{district_id}', "Master\DistrictController@destroy")->name('district.destroy');
});

// USER
Route::prefix('user')->group(function () {
    Route::get('/', 'Master\UserController@index')->name('user.index');
    Route::get('/create', 'Master\UserController@create')->name('user.create');
    Route::post('/create_submit', 'Master\UserController@create_submit')->name('user.create_submit');
    Route::get('/edit/{user_id}', 'Master\UserController@edit')->name('user.edit');
    Route::post('/update/{user_id}', 'Master\UserController@update')->name('user.update');
    Route::post('/destroy/{user_id}', "Master\UserController@destroy")->name('user.destroy');
});

// CENTER
Route::prefix('center')->group(function () {
    Route::get('/', 'Master\CenterController@index')->name('center.index');
    Route::get('/create', 'Master\CenterController@create')->name('center.create');
    Route::post('/create_submit', 'Master\CenterController@create_submit')->name('center.create_submit');
    Route::get('/edit/{center_id}', 'Master\CenterController@edit')->name('center.edit');
    Route::post('/update/{center_id}', 'Master\CenterController@update')->name('center.update');
    Route::post('/destroy/{center_id}', 'Master\CenterController@destroy')->name('center.destroy');
});