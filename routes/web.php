<?php

use App\Http\Controllers\AboutController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\CRUDController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CRUDNewsController;
use App\Http\Controllers\Admin\CRUDUsersController;
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




/*Route::name('admin.')
->prefix('admin')
->group(function(){
    Route::get('/', [CRUDController::class, 'index'])->name('index');
    Route::get('/showNews/{id}', [CRUDController::class, 'index'])->name('showNews');
    Route::match(['get', 'post'], '/create', [CRUDController::class, 'create'])->name('create');
    Route::delete('/delete/{news}', [CRUDController::class, 'delete'])->name('delete');
    Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
});*/

Route::resource('/admin/news', CRUDNewsController::class);

Route::name('user.')
->prefix('user')
->group(function(){
    Route::get('/', [CRUDUsersController::class, 'index'])->name('users');
    Route::get('/edit/{user}', [CRUDUsersController::class, 'edit'])->name('edit');
    Route::put('/store', [CRUDUsersController::class, 'store'])->name('store');
    Route::post('/toggle', [CRUDUsersController::class, 'toggle'])->name('toggle');

});

Auth::routes();




