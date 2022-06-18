<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\Video;


class IndexController extends Controller
{
    function Index(){
        $projects=Project::all();
        $videos=Video::all('status','video');
        return view("index",compact('projects','videos'));
    }

}
