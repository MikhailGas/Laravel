<?php

use App\Http\Controllers\AboutController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\CRUDController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CRUDNewsController;
use App\Http\Controllers\Admin\CRUDSourceController;
use App\Http\Controllers\Admin\CRUDUsersController;
use App\Http\Controllers\Admin\ParserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::name('news.')
->prefix('news')
->group(function(){
    Route::get('/categories', [CategoriesController::class, 'getCategories'])->name('categories');
    Route::get('/category/{slug}', [NewsController::class, 'getNewsByCategory'])->name('category');
    Route::get('/newsOne/{news}', [NewsController::class, 'getNewsById'])->name('newsOne');
});


Route::resource('/admin/news', CRUDNewsController::class);

Route::name('source.')
->prefix('source')
->middleware('auth')
->group(function(){
    Route::get('/parse', [ParserController::class, 'index'])->name('parse');
    Route::get('/', [CRUDSourceController::class, 'index'])->name('index');
    Route::match(['post', 'get'], '/add', [CRUDSourceController::class, 'add'])->name('add');
    Route::get('/delete/{source}', [CRUDSourceController::class, 'delete'])->name('delete');
    
});


Route::name('user.')
->prefix('user')
->group(function(){
    Route::get('/', [CRUDUsersController::class, 'index'])->name('users');
    Route::get('/edit/{user}', [CRUDUsersController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [CRUDUsersController::class, 'update'])->name('update');
    Route::post('/toggle/{user}', [CRUDUsersController::class, 'toggle'])->name('toggle');
    Route::get('/delete/{user}', [CRUDUsersController::class, 'delete'])->name('delete');
    
});

Auth::routes();



