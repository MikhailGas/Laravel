<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CRUDController extends Controller
{
    public static function index($id = null){
        if($id){
            return view('admin/index', ['news' => News::paginate(5), 'newsOne' => News::where('id', $id)->first()]);
        }
        else{
            return view('admin/index', ['news' => News::paginate(5)]);
        }
        
    }

    
    public static function create(Request $request){
        if($request->isMethod('post')){
            $url = null;
            if($request->file('image')){
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }
            
            $news = new News();
            $news->fill($request->all());
            $news->image = $url;
            $news->isPrivate = $request->isPrivate ? 1 : 0;
            
            $news->save();

            
            
            $request->flash();
            return redirect()->route('news.newsOne' , $news->id);
        }

        return view ('admin.create', [
            'categories' => Categories::all()
        ]);
    }

    public function delete(News $news){
        
        $news->delete();
        return redirect('admin');
    }
}
