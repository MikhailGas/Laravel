<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public static function getCategories(){
        
        return view('news/categories', ['categories' => Categories::all(), 'news' => News::query()->paginate(3)]);
    }
}
