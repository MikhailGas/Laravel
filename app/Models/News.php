<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [
        [
            'id' => '1',
            'category_id' => '1',
            'title' => 'Новость 1',
            'text' => 'Это хорошая новость про спорт 1'
        ],
        [
            'id' => '2',
            'category_id' => '1',
            'title' => 'Новость 2',
            'text' => 'Это хорошая новость про спорт 2'
        ],
        [
            'id' => '3',
            'category_id' => '2',
            'title' => 'Новость  3',
            'text' => 'Это хорошая новость про политику 3'
        ],
        [
            'id' => '4',
            'category_id' => '2',
            'title' => 'Новость  4',
            'text' => 'Это хорошая новость про политику 4'
        ]
    ];
    private static $categories = [
        '1' => 'Спорт',
        '2' => 'Политика'
    ];

    public static function getCategories(){
        return static::$categories;
    }

    public static function getNewsByCategoryId($id){
        $news = [];
        foreach(static::$news as $val){
            if($val['category_id'] == $id){
                $news[] = $val;
            }
        }
        return $news;
    }
}

