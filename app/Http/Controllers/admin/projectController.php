<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\projectRequest;
use App\Http\Requests\projectUpdateRequest;
use App\Models\Images;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\Request;
use File;
use Image;
class projectController extends Controller
{
    public function project(Request $request){
        $projects=Project::paginate(5);
        return view('admin.project',compact('projects'));
    }


    public function project_add(projectRequest $request){
        $information = $request->except('_token');

        if ($request['image'])
        {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $explode_filename = explode('.', $filename);
            $dir='projectphotos/';
            $path2=public_path('projectphotos/' . $explode_filename[0] . '_' .now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);
            if(!File::exists($dir))
            {
                File::makeDirectory($dir,0755,true);
            }
            $path_last = Image::make($image->getRealPath())->resize(250,250)->save($path2);
            $information['image']='projectphotos'.'/'.$path_last->basename;


        }
        $insert = Project::create($information);
        if ($insert) {
            return redirect()->back()->with('status-success', 'Yeni proje başarılı bir şekilde eklendi');

        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }

    public function project_edit(Request $request,$id){
        $projects=Project::paginate(5);
        $c = Project::where('id', '=', $id)->count();
        $photo='';
        $project_count= Project::where('id','=',$id)->count();
        if ($project_count){
            $project_data= Project::where('id','=',$id)->get('image');
            $photo= $project_data[0]['image'];
        }
        if ($c != 0) {
            $project_data = Project::where('id', '=', $id)->where('id','=',$id)->get();
            return view('admin.project_edit', compact('projects','photo','project_data'));
        } else {
            return redirect('admin.project');
        }

    }

    public function project_update(projectUpdateRequest $request){

        $id = $request->route('id');
        $c = Project::where('id', '=', $id)->count();
        $image_get = Project::where('id', '=', $id)->get();
        if ($c != 0) {
            $data = Project::where('id', '=', $id)->get();
            $all = $request->except('_token');
            if($request->file('image') and $image_get[0]['image'] !== null)
            {

                File::delete($image_get[0]['image']);
                $image       = $request->file('image');
                $filename    = $image->getClientOriginalName();
                $explode_filename = explode('.', $filename);
                $dir='projectphotos/';
                $path2=public_path('projectphotos/' . $explode_filename[0] . '_' .now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);
                if(!File::exists($dir))
                {
                    File::makeDirectory($dir,0755,true);
                }
                $path_last = Image::make($image->getRealPath())->save($path2);
                $all['image']='projectphotos'.'/'.$path_last->basename;

            }

            $update = Project::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status-success', 'Proje başarılı bir şekilde güncellendi');

            } else {
                return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
            }

        } else {
            return redirect('admin.project');
        }
    }


    public function changeStatus(Request $request)
    {
        $id = $request->projectID;
        $newStatus = null;
        $findExperience = Project::find($id);
        $status = $findExperience->status;
        if ($status)
        {
            $status = 0;
            $newStatus = "Pasif";
        }
        else
        {
            $status = 1;
            $newStatus = "Aktif";
        }

        $findExperience->status = $status;
        $findExperience->save();

        return redirect()->back()->with(response()->json([
            'newStatus' => $newStatus,
            'educationID' => $id,
            'status' => $status,
        ], 200));
    }

    public function project_delete(Request $request,$id){
        $c = Project::where('id', '=', $id)->count();
        $data = Project::where('id', '=', $id)->get();
        $image_delete=Images::where('project_id','=',$id)->get();
        $video_delete=Video::where('project_id','=',$id)->get();
        $image_delete_count=Images::where('project_id','=',$id)->count();
        $video_delete_count=Video::where('project_id','=',$id)->count();
        if ($c != 0) {
            if($data[0]['image'] !== null) {
                File::delete($data[0]['image']);
            }
            $a=0;
            if($image_delete_count !== 0) {
                foreach ($image_delete as $i) {
                    $delete_i = File::delete($image_delete[$a]['image']);
                    $a +=1;
                }}
            $b=0;
            if($video_delete_count !== 0) {
                foreach ($video_delete as $i) {
                    $delete_v = File::delete($video_delete[$b]['video']);
                    $b +=1;
                }}


            $delete = Project::where('id', '=', $id)->delete();
            if($delete){
                return redirect('admin/proje')->with('status-success', 'Proje başarılı bir şekilde silindi');
            }
        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');

        }

    }



}
