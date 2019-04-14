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

Route::get('/', 'Home\HomeController@index')->name('home');
Route::get('/category/{id}', 'Home\CategoryController@index')->name('category');
Route::get('/category1/{id}', 'Home\CategoryController@index1')->name('category');
Route::get('/classes/{id}', 'Home\ClassesController@index')->name('classes');
Route::get('/test/{id}', 'Home\TestController@index')->name('test');
Route::post('/resulttest/{id}', 'Home\TestController@resultTest')->name('resulttest');
Route::get('/resulttest/{id}', 'Home\TestController@resultTestUser');
Route::get('/historytest', 'Home\HistoryTestController@index')->name('historytest');
Route::get('/forum', 'Home\ForumController@index')->name('forum');
Route::get('/profile', 'Home\UserController@index')->name('profile');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin');
    Route::get('/login', 'AuthAdmin\AdminLoginController@index')->name('adminAuth.login');
    Route::post('/login', 'AuthAdmin\AdminLoginController@login')->name('adminAuth.submitLogin');
    Route::get('/logout', 'AuthAdmin\AdminLoginController@logout')->name('adminAuth.logout');

    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/courses', 'Admin\CoursesController');
    Route::resource('/classes', 'Admin\ClassesController');

    Route::resource('/lesson', 'Admin\LessonController');
    Route::resource('/lessonvocabulary', 'Admin\LessonVocabularyController');
    Route::get('/createlesson', 'Admin\LessonController@createLesson');

    
    Route::resource('/vocabulary', 'Admin\VocabularyController');
    Route::resource('/grammar', 'Admin\GrammarController');

    Route::resource('/test', 'Admin\TestController');
    Route::resource('/testquestion', 'Admin\TestQuestionController');
    Route::get('/createtestquestion', 'Admin\TestQuestionController@createTestQuestion');
    Route::get('/testquestiondetail', 'Admin\TestQuestionController@createTestQuestionDetail');
    
    Route::resource('/resulttest', 'Admin\ResultTestController');
    Route::get('/resulttestdetail/{id}', 'Admin\ResultTestController@resultTestDetail');
    Route::get('/transText', 'Admin\VocabularyController@transText');
    
    Route::resource('/users', 'Admin\UserController');
});

Auth::routes();
Route::get('/auth', 'Home\AuthController@index');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
