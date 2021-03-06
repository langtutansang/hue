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
Route::get('/forum/{id}', 'Home\ForumController@detail')->name('forum.detail');
Route::post('/forum/{id}', 'Home\ForumController@comment')->name('forum.comment');

Route::get('/forum-create', 'Home\ForumController@create')->name('forum.create');
Route::post('/forum-create', 'Home\ForumController@store');


Route::get('/profile', 'Home\AccountController@index')->name('profile');
Route::post('/profile/info', 'Home\AccountController@changeInfo');
Route::post('/profile/password', 'Home\AccountController@changePassword');
Route::get('/auth/login', 'Home\AuthController@login');
Route::get('/auth/register', 'Home\AuthController@register');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin');
    Route::get('/login', 'AuthAdmin\AdminLoginController@index')->name('adminAuth.login');
    Route::post('/login', 'AuthAdmin\AdminLoginController@login')->name('adminAuth.submitLogin');
    Route::get('/logout', 'AuthAdmin\AdminLoginController@logout')->name('adminAuth.logout');

    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/courses', 'Admin\CoursesController');
    Route::resource('/classes', 'Admin\ClassesController');

    Route::post('/lesson/{id}', 'Admin\LessonController@update');
    Route::resource('/lesson', 'Admin\LessonController');
    Route::resource('/lessonvocabulary', 'Admin\LessonVocabularyController');

    
    Route::resource('/vocabulary', 'Admin\VocabularyController');
    Route::resource('/grammar', 'Admin\GrammarController');

    Route::resource('/test', 'Admin\TestController');
    Route::resource('/testquestion', 'Admin\TestQuestionController');
    Route::get('/createtestquestion', 'Admin\TestQuestionController@createTestQuestion');
    Route::get('/testquestiondetail', 'Admin\TestQuestionController@createTestQuestionDetail');
    
    Route::resource('/resulttest', 'Admin\ResultTestController');
    Route::get('/resulttestdetail/{id}', 'Admin\ResultTestController@resultTestDetail');
    Route::get('/transText/{data}', 'Admin\VocabularyController@transText');
    Route::get('/getAudio/{data}', 'Admin\VocabularyController@getAudio');
    
    Route::resource('/users', 'Admin\UserController');
});

Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
