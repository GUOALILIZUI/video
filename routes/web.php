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

Route::get('/', function () {
    return view('welcome');
});
Route::get('oss1',"Video\VideoController@oss1");
Route::get('oss2',"Video\VideoController@oss2");
Route::get('saveVideo',"Video\VideoController@saveVideo");
Route::get('index',"Video\VideoController@index");  //播放视频

Route::post('oss',"Video\VideoController@oss");
