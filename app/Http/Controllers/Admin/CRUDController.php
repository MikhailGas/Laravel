<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Files;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public static function create(Request $request){
        if($request->isMethod('post')){
            $request->except('_token');
            $id = Files::addDataInFile('news', $request->except('_token'));
            $request->flash();
            return redirect()->route('news.newsOne' , $id);
        }

        return view ('admin.create', [
            'categories' => Categories::getCategories()
        ]);
    }
}
