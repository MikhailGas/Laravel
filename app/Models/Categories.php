<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Categories extends Model
{
    
    public static function getCategories(){
       
        return Files::getDataFromFile('categories');
    }

    public static function getCategoryIdBySlug($slug){
        foreach(Files::getDataFromFile('categories') as $category){
            if($category['slug'] == $slug){
                return $category['id'];
            }            
        }
        return [];
    }
}


