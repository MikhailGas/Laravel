<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function getNewsByCategory($slug){
        return view('news/news')->with('news', News::query()->where('category_id', Categories::where('slug', $slug)->first()->id)->paginate(3));
    }

    public static function getNewsById(News $news){
        
        return view('news/oneNews')->with('news', $news);
    }
}
