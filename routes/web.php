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

Route::prefix('admin')->group(function() {
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

    // POST
    Route::prefix('post')->group(function () {
        Route::get('/', 'Master\PostController@index')->name('post.index');
        Route::get('/create', 'Master\PostController@create')->name('post.create');
        Route::post('/create_submit', 'Master\PostController@create_submit')->name('post.create_submit');
        Route::get('/edit/{post_id}', 'Master\PostController@edit')->name('post.edit');
        Route::post('/update/{post_id}', 'Master\PostController@update')->name('post.update');
        Route::post('/destroy/{post_id}', "Master\PostController@destroy")->name('post.destroy');
    });

    // BRANCH
    Route::prefix('branch')->group(function () {
        Route::get('/', 'Master\BranchController@index')->name('branch.index');
        Route::get('/create', 'Master\BranchController@create')->name('branch.create');
        Route::post('/create_submit', 'Master\BranchController@create_submit')->name('branch.create_submit');
        Route::get('/edit/{branch_id}', 'Master\BranchController@edit')->name('branch.edit');
        Route::post('/update/{branch_id}', 'Master\BranchController@update')->name('branch.update');
        Route::post('/destroy/{branch_id}', "Master\BranchController@destroy")->name('branch.destroy');
    });

    // CATEGOGY
    Route::prefix('category')->group(function () {
        Route::get('/', 'Master\CategoryController@index')->name('category.index');
        Route::get('/create', 'Master\CategoryController@create')->name('category.create');
        Route::post('/create_submit', 'Master\CategoryController@create_submit')->name('category.create_submit');
        Route::get('/edit/{category_id}', 'Master\CategoryController@edit')->name('category.edit');
        Route::post('/update/{category_id}', 'Master\CategoryController@update')->name('category.update');
        Route::post('/destroy/{category_id}', "Master\CategoryController@destroy")->name('category.destroy');
    });
});