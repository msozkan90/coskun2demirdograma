<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\videoRequest;
use App\Http\Requests\videoUpdateRequest;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\Request;
use File;
class videoController extends Controller
{
    public function video(Request $request){
        $videos=Video::paginate(5);
        $projects=Project::all('id','title');
        return view('admin.video',compact('videos','projects'));
    }


    public function video_add(videoRequest $request)
    {
        $information = $request->except('_token');
        $project_id = $information['project_id'];
        $project = Project::where('id', '=', $project_id)->get('title');
        $project_name = $project[0]['title'];
        if ($request['video']) {
            $video = $request->file('video');
            $filename = $video->getClientOriginalName();
            $explode_filename = explode('.', $filename);
            $dir = 'videos/' . $project_name;

            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
            $a=  $request->file('video')->storeAs($dir , $explode_filename[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);
            $information['video'] = $a;
            $directory = 'videos/' . $project_name;
            $video->move($directory, $a);

        }
        $insert = Video::create($information);
        if ($insert) {
            $deneme =     File::delete( '../storage/app/' . $insert['video']);
            return redirect()->back()->with('status-success', 'Yeni video başarılı bir şekilde eklendi');

        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }

    public function video_edit(Request $request,$id){
        $projects=Project::all('id','title');
        $videos=Video::paginate(5);
        $c = Video::where('id', '=', $id)->where('id','=',$id)->count();
        $video_all_data = Video::where('id', '=', $id)->where('id','=',$id)->get('project_id');
        $video='';
        $video_count= Video::where('id','=',$id)->count();
        if ($video_count){
            $video_data= Video::where('id','=',$id)->get('video');
            $project_title=Project::where('id','=',$video_all_data[0]['project_id'])->get('title')[0]['title'];
        }
        if ($c != 0) {
            $video_data = Video::where('id', '=', $id)->get();
            return view('admin.video_edit', compact('videos','video','video_data','projects','project_title'));
        } else {
            return redirect('admin.video');
        }

    }

    public function video_update(videoUpdateRequest $request){

        $id = $request->route('id');
        $video_get = Video::where('id', '=', $id)->get();
        $project=Project::where('id','=',$video_get[0]['project_id'])->get('title');
        $project_name=$project[0]['title'];
        $c = Video::where('id', '=', $id)->count();

        if ($c != 0) {
            $all = $request->except('_token');
            if($request->file('video'))
            {
                File::delete($video_get[0]['video']);
                $video       = $request->file('video');
                $filename    = $video->getClientOriginalName();
                $explode_filename = explode('.', $filename);
                $dir='videos/' . $project_name;
                $dir = 'videos/' . $project_name;
                if(!File::exists($dir))
                {
                    File::makeDirectory($dir,0755,true);
                }
                $a=  $request->file('video')->storeAs($dir , $explode_filename[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);
                $all['video'] = $a;
                $directory = 'videos/' . $project_name;
                $video->move($directory, $a);

            }

            $update = Video::where('id', '=', $id)->update($all);
            if ($update) {

                if($request->file('video')){
                    $deneme =     File::delete( '../storage/app/' . $all['video']);
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
               $deneme = File::delete($data[0]['video']);

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
