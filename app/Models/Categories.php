<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Categories extends Model
{
    
    public static function getCategories(){
       
        return DB::table('categories')->get();
    }

    public static function getCategoryIdBySlug($slug){
        return DB::table('categories')->where('slug', $slug)->first()->id;
        
    }
}


