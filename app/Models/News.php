<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File as HttpFile;


class News extends Model
{
    public static function getNews(){
        
        return Files::getDataFromFile('news');
    } 

    public static function getNewsById($id){
        foreach(Files::getDataFromFile('news') as $newsOne){
            if($newsOne['id'] == $id){
                return $newsOne;
                break;
            }
        }
        return [];
    } 

    public static function getNewsByCategory($slug){
        $newsList = [];
        foreach(Files::getDataFromFile('news') as $newsOne){
            if($newsOne['category_id'] == Categories::getCategoryIdBySlug($slug)){
                $newsList[] = $newsOne;
            }
        }
        return $newsList;
    }

    
    
}

