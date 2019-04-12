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

Route::get('/', 'Home\HomeController@index')->name('');
Route::get('/category/{id}', 'Home\CategoryController@index')->name('category');
Route::get('/category1/{id}', 'Home\CategoryController@index1')->name('category');
Route::get('/classes/{id}', 'Home\ClassesController@index')->name('classes');
Route::get('/test/{id}', 'Home\TestController@index')->name('test');
Route::post('/resulttest/{id}', 'Home\TestController@resultTest')->name('resulttest');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Home\HomeController@admin')->name('admin');
    Route::get('/login', 'AuthAdmin\AdminLoginController@index')->name('adminAuth.login');
    Route::post('/login', 'AuthAdmin\AdminLoginController@login')->name('adminAuth.submitLogin');
    Route::get('/logout', 'AuthAdmin\AdminLoginController@logout')->name('adminAuth.logout');

    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/classes', 'Admin\ClassesController');
    
});

Auth::routes();
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
