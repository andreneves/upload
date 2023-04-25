<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;


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

Route::get('/upload/image', 'App\Http\Controllers\UploadController@form_image')->name('form_image');
Route::post('/upload/image', 'App\Http\Controllers\UploadController@upload_image')->name('upload_image');

