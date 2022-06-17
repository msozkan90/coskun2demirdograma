<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoDto;
use App\Models\Images;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    function index(){

        $projects=Project::all();
//        $videos = VideoDto::collection(Video::all('status','video'));
        $videos=Video::all('status','video');
//        $images=Images::all();
        return view("index",compact('projects','videos'));
    }

}
