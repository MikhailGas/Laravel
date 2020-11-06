<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;

class CRUDSourceController extends Controller
{
    public function index(Source $sources){      
        return view('admin.sources.index')->with(['sources' => $sources::paginate(20)]);
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $this->validate($request, Source::rules(), [], Source::attributeNames());

            $source = new Source();
            $source->fill($request->all());

            $source->save();
            $request->flash();

            return redirect()->route('source.index');
        }
        return view('admin.sources.add');
    }

    public function delete(Source $source){
        $source->delete();
        return redirect()->route('source.index');
    }
}
