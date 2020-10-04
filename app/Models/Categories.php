<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    private static $categories = [
        [
            'id' => 1,
            'name' => 'Спорт',
            'slug' => 'sport'
        ],
        [
            'id' => 2,
            'name' => 'Политика',
            'slug' => 'politics'
        ]
    ];
    public static function getCategories(){
        return static::$categories;
    }

    public static function getCategoryIdBySlug($slug){
        foreach(static::$categories as $category){
            if($category['slug'] == $slug){
                return $category['id'];
            }            
        }
        return [];
    }
}


