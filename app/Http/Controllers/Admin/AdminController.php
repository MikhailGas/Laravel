<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function index(){
        return view('admin/index');
    }

    public static function test1(){
        return view('admin/test1');
    }

    public static function test2(){
        return view('admin/test2');
    }
}
