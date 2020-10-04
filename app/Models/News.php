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
            'id' => 3,
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
    
    public static function getNews(){
        return static::$news;
    } 

    public static function getNewsById($id){
        foreach(static::$news as $newsOne){
            if($newsOne['id'] == $id){
                return $newsOne;
                break;
            }
        }
        return [];
    } 

    public static function getNewsByCategory($slug){
        $newsList = [];
        foreach(static::$news as $newsOne){
            if($newsOne['category_id'] == Categories::getCategoryIdBySlug($slug)){
                $newsList[] = $newsOne;
            }
        }
        return $newsList;
    }

    
    
}

