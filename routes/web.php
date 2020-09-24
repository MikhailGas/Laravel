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
//Домашняя работа к уроку №1

Route::view('/', 'index');
Route::view('/about', 'about');
Route::view('/news', 'news');
/*Route::get('/', function () {
    return view('welcome');
});*/
