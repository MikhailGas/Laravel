<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function getCategories(){
        return view('news/categories')->with('categories', News::getCategories());
    }

    public function getNewsByCategory($slug){
        return view('news/news')->with('news', News::getNewsByCategory($slug));
    }

    public static function getNewsById($id){
        return view('news/oneNews')->with('news', News::getNewsById($id));
    }
}
