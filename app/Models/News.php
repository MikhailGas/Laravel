<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $fillable = ['title', 'text', 'category_id', 'isPrivate', 'image'];


    

    
    
}

