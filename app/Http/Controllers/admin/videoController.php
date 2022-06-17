<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\videoRequest;
use App\Http\Requests\videoUpdateRequest;
use App\Models\Project;
use App\Models\Video;
use App\Services\VideoService;
use Illuminate\Http\Request;
use File;
class videoController extends Controller
{
    public function video(Request $request){
        $videos=Video::paginate(4);
        $projects=Project::all('id','title');
        return view('admin.video',compact('videos','projects'));
    }
    public function video_add(videoRequest $request)
    {
        $information = $request->except('_token');
        $project_id = $information['project_id'];
        $project = Project::where('id', '=', $project_id)->get('title');
        $project_name = $project[0]['title'];

        $call_service= new VideoService();
        $insert=   $call_service->video_add($request,$project_name,$information);
        if ($insert) {
            File::delete( '../storage/app/' . $insert['video']);
            return redirect()->back()->with('status-success', 'Yeni video başarılı bir şekilde eklendi');

        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }
    public function video_edit(Request $request,$id){
        $projects=Project::all('id','title');
        $videos=Video::paginate(4);
        $video_all_data = Video::where('id', '=', $id)->get('project_id');
        $video_count= Video::where('id','=',$id)->count();
        if ($video_count != 0) {
            $project_title=Project::where('id','=',$video_all_data[0]['project_id'])->get('title')[0]['title'];
            $video_data = Video::where('id', '=', $id)->get();
            return view('admin.video_edit', compact('videos','video_data','projects','project_title'));
        } else {
            return redirect('admin.video');
        }

    }
    public function video_update(videoUpdateRequest $request){
        $id = $request->route('id');
        $video_get = Video::where('id', '=', $id)->get();
        $project=Project::where('id','=',$video_get[0]['project_id'])->get('title');
        $project_name=$project[0]['title'];
        $video_count = Video::where('id', '=', $id)->count();
        $all = $request->except('_token');
        if ($video_count != 0) {
            $call_service= new VideoService();
            $update=   $call_service->video_update($request,$video_get,$project_name,$id);
            if ($update) {
                if($request->file('video')){
                     File::delete( '../storage/app/' . $all['video']);
                }
                return redirect()->back()->with('status-success', 'Video başarılı bir şekilde güncellendi');
            } else {
                return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
            }
        }
        else {
            return redirect('admin.video');
        }
    }
    public function changeStatus(Request $request)
    {
        $id = $request->videoID;
        $newStatus = null;
        $findExperience = Video::find($id);
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
    public function video_delete(Request $request,$id){
        $c = Video::where('id', '=', $id)->count();
        $data = Video::where('id', '=', $id)->get();
        if ($c != 0) {
            if($data[0]['video'] !== null) {
               File::delete($data[0]['video']);
            }
            $delete = Video::where('id', '=', $id)->delete();
            if($delete){
                return redirect('admin/video')->with('status-success', 'Video başarılı bir şekilde silindi');
            }
        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }
}
