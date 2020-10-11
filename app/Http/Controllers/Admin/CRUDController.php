<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CRUDController extends Controller
{
    public static function create(Request $request){
        if($request->isMethod('post')){
            $url = null;
            if($request->file('image')){
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }
            
            $id = DB::table('news')->insertGetId([
                'title' => $request->title,
                'text' => $request->text,
                'category_id' => $request->category_id,
                'isPrivate' => $request->isPrivate ? $request->isPrivate : 0,
                'image' => $url
            ]
            );
            $request->flash();
            return redirect()->route('news.newsOne' , $id);
        }

        return view ('admin.create', [
            'categories' => Categories::getCategories()
        ]);
    }
}
