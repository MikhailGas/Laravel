<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;

use App\Models\Source;
use Illuminate\Support\Facades\Redis;

class ParserController extends Controller
{
    public function index(){
        
        $resources = Source::all();
        
        
        foreach($resources as $source){
            NewsParsing::dispatch($source->link);
        }
    
        return redirect()->route('news.categories');
        
    }


    
}
