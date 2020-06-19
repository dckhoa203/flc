<?php

use Illuminate\Support\Facades\Route;
use App\Models\Branch;
use App\Models\Post;

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
Auth::routes();

Route::get('/','HomeController@index')->name('home');
Route::get('/show_post/{post_id}','HomeController@show_post')->name('show_post');

Route::get('/login','LoginController@index')->name('login');
Route::post('/postlogin','LoginController@login')->name('postlogin');
route::post('/register','LoginController@register')->name('register');
Route::get('/logout','LoginController@logout')->name('logout');

Route::group(['middleware' => ['checklogin']], function () {
    Route::get('/profile', 'LoginController@profile')->name('profile');
    Route::get('/postprofile', 'LoginController@postprofile')->name('postprofile');

    Route::group(['middleware' => ['checkadmin']], function () {
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

            // INVOICE
            Route::prefix('invoice')->group(function () {
                Route::get('/', 'Master\InvoiceController@index')->name('invoice.index');
                Route::post('/getdata', "Master\InvoiceController@get_data")->name('invoice.getdata');
                Route::get('/list/{post_id}', 'Master\InvoiceController@list')->name('invoice.list');
                Route::get('/report/{invoice_id}', 'Master\InvoiceController@report')->name('invoice.report');
                Route::post('/getreportdata', 'Master\InvoiceController@getreportdata')->name('invoice.getreportdata');
            });
        });
    });
    

    // COLLABORATOR
    Route::group(['middleware' => ['checkcol']], function () {
        Route::prefix('col')->group(function() {
            Route::get('/', 'Collaborator\PostController@index')->name('col.index');
            // POST
            Route::prefix('post')->group(function () {
                Route::get('/', 'Collaborator\PostController@index')->name('col.post.index');
                Route::get('/create', 'Collaborator\PostController@create')->name('col.post.create');
                Route::post('/create_submit', 'Collaborator\PostController@create_submit')->name('col.post.create_submit');
                Route::get('/edit/{post_id}', 'Collaborator\PostController@edit')->name('col.post.edit');
                Route::post('/update/{post_id}', 'Collaborator\PostController@update')->name('col.post.update');
                Route::post('/destroy/{post_id}', "Collaborator\PostController@destroy")->name('col.post.destroy');
                Route::post('/getdata', 'Collaborator\PostController@get_data')->name('col.post.getdata');
                Route::get('/show/{post_id}', 'Collaborator\PostController@show')->name('col.post.show');
            });

            // INVOICE
            Route::prefix('invoice')->group(function () {
                Route::get('/', 'Collaborator\InvoiceController@index')->name('col.invoice.index');
                Route::post('/getdata', "Collaborator\InvoiceController@get_data")->name('col.invoice.getdata');
                Route::get('/list/{post_id}', 'Collaborator\InvoiceController@list')->name('col.invoice.list');
                Route::get('/report/{invoice_id}', 'Collaborator\InvoiceController@report')->name('col.invoice.report');
                Route::post('/getreportdata', 'Collaborator\InvoiceController@getreportdata')->name('col.invoice.getreportdata');
                Route::post('/approved/{invoice_id}', 'Collaborator\InvoiceController@approved')->name('col.invoice.approved');
            });
        });
    });

    // MEMBER
    Route::group(['middleware' => ['checkmem']], function () {
        Route::prefix('mem')->group(function() {
            Route::get('/', 'Member\InvoiceController@index')->name('mem.index');
            Route::post('/getdata', 'Member\InvoiceController@get_data')->name('mem.invoice.getdata');
            Route::get('/report/{invoice_id}', 'Member\InvoiceController@report')->name('mem.invoice.report');
            Route::get('/register', 'Member\InvoiceController@register_course')->name('mem.register');
            Route::post('/postregister/{post_id}', 'Member\InvoiceController@post_register_course')->name('mem.postregister');
            Route::get('/show/{post_id}', 'Member\InvoiceController@show')->name('mem.show');
        });
    });
    

});

