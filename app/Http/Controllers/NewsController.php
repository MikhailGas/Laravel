<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function getCategories(){
        return view('news/categories')->with('categories', News::getCategories());
    }
}
