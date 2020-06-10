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
    return view('home');
})->name('home');

Route::get('/login','LoginController@index')->name('login');
// Route::post('/login','login@postLogin')->name('postLogin');
route::post('/register','LoginController@register')->name('register');
// route::post('/register','login@postRegister')->name('postRegister');
// Route::get('/logout','login@logout')->name('logout');

// ADMIN
Route::prefix('admin')->group(function() {
    Route::get('/', 'Master\PostController@get_approved')->name('admin.index');
    // CITY
    Route::prefix('city')->group(function () {
        Route::get('/', 'Master\CityController@index')->name('city.index');
        Route::get('/create', 'Master\CityController@create')->name('city.create');
        Route::post('/create_submit', 'Master\CityController@create_submit')->name('city.create_submit');
        Route::get('/edit/{city_id}', 'Master\CityController@edit')->name('city.edit');
        Route::post('/update/{city_id}', 'Master\CityController@update')->name('city.update');
        Route::post('/destroy/{city_id}', "Master\CityController@destroy")->name('city.destroy');
        Route::get('/get_city', 'Master\CityController@get_city')->name('city.get_city');
    });

    // DISTRICT
    Route::prefix('district')->group(function () {
        Route::get('/', 'Master\DistrictController@index')->name('district.index');
        Route::get('/create', 'Master\DistrictController@create')->name('district.create');
        Route::post('/create_submit', 'Master\DistrictController@create_submit')->name('district.create_submit');
        Route::get('/edit/{district_id}', 'Master\DistrictController@edit')->name('district.edit');
        Route::post('/update/{district_id}', 'Master\DistrictController@update')->name('district.update');
        Route::post('/destroy/{district_id}', "Master\DistrictController@destroy")->name('district.destroy');
        Route::get('/get_district', 'Master\DistrictController@get_district')->name('district.get_district');
        Route::post('/get_district_city', 'Master\DistrictController@get_district_city')->name('district.get_district_city');
    });

    // USER
    Route::prefix('account')->group(function () {
        Route::get('/', 'Master\AccountController@index')->name('account.index');
        Route::get('/create', 'Master\AccountController@create')->name('account.create');
        Route::post('/create_submit', 'Master\AccountController@create_submit')->name('account.create_submit');
        Route::get('/edit/{user_id}', 'Master\AccountController@edit')->name('account.edit');
        Route::post('/update/{user_id}', 'Master\AccountController@update')->name('account.update');
        Route::post('/destroy/{user_id}', "Master\AccountController@destroy")->name('account.destroy');
        Route::get('/collaborator', "Master\AccountController@collaborator")->name('account.collaborator');
        Route::get('/member', "Master\AccountController@member")->name('account.member');
    });

    // CENTER
    Route::prefix('center')->group(function () {
        Route::get('/', 'Master\CenterController@index')->name('center.index');
        Route::get('/create', 'Master\CenterController@create')->name('center.create');
        Route::post('/create_submit', 'Master\CenterController@create_submit')->name('center.create_submit');
        Route::get('/edit/{center_id}', 'Master\CenterController@edit')->name('center.edit');
        Route::post('/update/{center_id}', 'Master\CenterController@update')->name('center.update');
        Route::post('/destroy/{center_id}', 'Master\CenterController@destroy')->name('center.destroy');
        Route::get('/get_center', 'Master\CenterController@get_center')->name('center.get_center');
    });

    // POST
    Route::prefix('post')->group(function () {
        Route::get('/', 'Master\PostController@index')->name('post.index');
        Route::get('/create', 'Master\PostController@create')->name('post.create');
        Route::post('/create_submit', 'Master\PostController@create_submit')->name('post.create_submit');
        Route::get('/edit/{post_id}', 'Master\PostController@edit')->name('post.edit');
        Route::post('/update/{post_id}', 'Master\PostController@update')->name('post.update');
        Route::post('/destroy/{post_id}', "Master\PostController@destroy")->name('post.destroy');
        Route::get('/get_approved', 'Master\PostController@get_approved')->name('post.get_approved');
        Route::post('/approved', 'Master\PostController@approved')->name('post.approved');
        Route::post('/removed', 'Master\PostController@removed')->name('post.removed');
        Route::post('/getdata', 'Master\PostController@get_data')->name('post.getdata');
        Route::get('/show/{post_id}', 'Master\PostController@show')->name('post.show');
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
        Route::get('/get_category', 'Master\CategoryController@get_category')->name('category.get_category');
    });

    // COMMENT
    Route::prefix('comment')->group(function () {
        Route::get('/', 'Master\CommentController@index')->name('comment.index');
        Route::get('/create', 'Master\CommentController@create')->name('comment.create');
        Route::post('/create_submit', 'Master\CommentController@create_submit')->name('comment.create_submit');
        Route::get('/edit/{comment_id}', 'Master\CommentController@edit')->name('comment.edit');
        Route::post('/update/{comment_id}', 'Master\CommentController@update')->name('comment.update');
        Route::post('/destroy/{comment_id}', "Master\CommentController@destroy")->name('comment.destroy');
        Route::post('/getdata', "Master\CommentController@get_data")->name('comment.getdata');
        Route::get('/show/{comment_id}', 'Master\CommentController@show')->name('comment.show');
    });
});

// MEMBER
// Route::prefix('app')->group(function() {
//     Route::get('/', 'Master\BranchController@index')->name('branch.index');
// });