<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CRUDNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/index', ['news' => News::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.create', [
            'categories' => Categories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
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
            
        }
        
        return redirect('admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin/index', ['news' => News::paginate(5), 'newsOne' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        
        return view('admin/edit', ['news' => $news, 'categories' => Categories::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        if($request->isMethod('post')){
            $url = null;
            if($request->file('image')){
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }
            
            $news->fill($request->all());
            $news->isPrivate = $request->isPrivate ? 1 : 0;
            dd($news);
            $news->save();

            
            $request->flash();
            
        }
        
        return redirect('admin/news');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect('admin/news');
    }
}
