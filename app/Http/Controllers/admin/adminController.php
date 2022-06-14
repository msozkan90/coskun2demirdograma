<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Project;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(Request $request){
        $date = \Carbon\Carbon::now();
        $lastMonth =  $date->subMonth()->format('m');
        $projects_count=Project::all()->count();
        $users_count=User::all()->count();
        $images_count=Images::all()->count();
        $videos_count=Video::all()->count();

        $projects_last=Project::latest()->first();
        $users_last=User::latest()->first();
        $images_last=Images::latest()->first();
        $videos_last=Video::latest()->first();

        $projects_last_month=Project::where('created_at','>=',$lastMonth)->count();
        $users_last_month=User::where('created_at','>=',$lastMonth)->count();
        $images_last_month=Images::where('created_at','>=',$lastMonth)->count();
        $videos_last_month=Video::where('created_at','>=',$lastMonth)->count();
        return view('admin.index',compact('projects_count','users_count','images_count','videos_count','projects_last','videos_last','images_last','users_last','projects_last_month','users_last_month','images_last_month','videos_last_month'));
    }

}
