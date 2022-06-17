<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\projectRequest;
use App\Http\Requests\projectUpdateRequest;
use App\Models\Images;
use App\Models\Project;
use App\Models\Video;
use App\Services\ProjectService;
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

        $call_service= new ProjectService();
        $insert = $call_service->project_image_add($request,$information);
        if ($insert) {
            return redirect()->back()->with('status-success', 'Yeni proje başarılı bir şekilde eklendi');
        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }
    public function project_edit(Request $request,$id){
        $projects=Project::paginate(5);
        $project_count= Project::where('id','=',$id)->count();
        if ($project_count != 0) {
            $project_data= Project::where('id','=',$id)->get('image');
            $photo= $project_data[0]['image'];
            $project_data = Project::where('id', '=', $id)->where('id','=',$id)->get();
            return view('admin.project_edit', compact('projects','photo','project_data'));
        } else {
            return redirect('admin.project');
        }
    }
    public function project_update(projectUpdateRequest $request){
        $id = $request->route('id');
        $project_count = Project::where('id', '=', $id)->count();
        $image_get = Project::where('id', '=', $id)->get();

        if ($project_count != 0) {
            $call_service= new ProjectService();
            $update= $call_service->project_image_update($request,$image_get,$id);
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
        $project_count = Project::where('id', '=', $id)->count();
        $data = Project::where('id', '=', $id)->get();
        $image_delete=Images::where('project_id','=',$id)->get();
        $video_delete=Video::where('project_id','=',$id)->get();
        $image_delete_count=Images::where('project_id','=',$id)->count();
        $video_delete_count=Video::where('project_id','=',$id)->count();
        $delete=true;
        if ($project_count != 0) {
            $call_service= new ProjectService();
            $call_service->project_image_delete($data,$image_delete_count,$image_delete,$video_delete_count,$video_delete,$id);
            if($delete){
                return redirect('admin/proje')->with('status-success', 'Proje başarılı bir şekilde silindi');
            }
        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }
}
