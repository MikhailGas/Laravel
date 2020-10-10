<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    public static function getNews(){
        return DB::table('news')->get();
        
    } 

    public static function getNewsById($id){
        return DB::table('news')->where('id', $id)->first();
        
    } 

    public static function getNewsByCategory($slug){

        return DB::table('news')->where('id', Categories::getCategoryIdBySlug($slug))->first();
        
    }

    
    
}

