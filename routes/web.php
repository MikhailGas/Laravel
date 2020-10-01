<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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
//Routing

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::name('news.')
->prefix('news')
->group(function(){
    Route::get('/categories', [NewsController::class, 'getCategories'])->name('categories');
    Route::get('/news/{id}', [NewsController::class, 'getNewsByCategoryId'])->name('news');
    Route::get('/newsOne/{id}', [NewsController::class, 'getNewsById'])->name('newsOne');
});




/*Route::name('admin.')
->prefix('admin')
->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
    Route::get('/test2', [IndexController::class, 'test2'])->name('test2');
});*/