<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $fillable = ['title', 'text', 'category_id', 'isPrivate', 'image'];

    public static function rules(){
        $tableNameCategories = (new Categories)->getTable();
        return [
            'title' => 'required|max:255',
            'text' => 'required',
            'category_id' => "required|exists:{$tableNameCategories},id",
            'image' => 'mimes:jpeg,png,bmp|max:1000'
        ];
    }

    public static function attributeNames(){
        return [
            'title' => 'заголовок новости',
            'text' => 'текст новости',
            'category_id' => 'категория новости',
            'image' => 'изображение'
        ];
    }
    

    
    
}

