<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;

use App\Models\Source;
use App\Services\XMLParserService;
use Illuminate\Support\Facades\Redis;

class ParserController extends Controller
{
    public function index(XMLParserService $parse){
        
        $resources = Source::all();
        
       
        foreach($resources as $source){
            $parse->saveNews($source->link);
        }
    
        return redirect()->route('news.categories');
        
    }


    
}
