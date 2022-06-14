<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    function index(){

        $projects=Project::all();
        $videos=Video::all();
        $images=Images::all();
        return view("index",compact('projects','videos','images'));
    }

    function changeLang($langcode){

        App::setLocale($langcode);
        session()->put("lang_code",$langcode);
        return redirect()->back();
    }
}
