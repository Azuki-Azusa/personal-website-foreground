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
    return view('homepage');
});

Route::get('/bloglist', 'BlogController@blogList');
Route::get('/blog/{blog_id}', 'BlogController@blog');
Route::post('/blog/comment', 'BlogController@submitComment');

Route::get('/lyric/{lyric_id}', 'LyricController@lyric');

Route::get('/toolkit', function(){
    return view('toolkit');
});