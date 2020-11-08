<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = ['name', 'link'];
    use HasFactory;

    public static function rules(){
        $tableNameSource = (new Source)->getTable();
        return [
            'name' => 'required|max:100',
            'link' => "required|url|unique:{$tableNameSource},link",
        ];
    }

    public static function attributeNames(){
        return [
            'name' => 'заголовок новости',
            
        ];
    }
}
