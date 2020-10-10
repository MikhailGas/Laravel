<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File as FacadesFile;

class Files extends Model
{
    public static function getDataFromFile($file){
        return json_decode(FacadesFile::get(storage_path('/'. $file . '.json')), true);
    }

    public static function addDataInFile(string $file, array $data, $url){
        $news = static::getDataFromFile($file);
        $id = static::createId($file);
        $data['id'] = $id;
        $data['image'] = $url;
        $news[] = $data;
        FacadesFile::put(storage_path('/' . $file . '.json'), json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return $id;
    }


    private static function createId($file){
        $id = rand(5,100);
        $news = static::getDataFromFile($file);
        foreach($news as $item){
            if($item['id'] == $id){
                static::createId($file);
            }
        }
        return $id;
    }
}
