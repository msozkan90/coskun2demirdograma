<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\imageRequest;
use App\Http\Requests\imageUpdateRequest;
use App\Models\Images;
use App\Models\Project;
use App\Services\ImageService;
use Illuminate\Http\Request;
use File;
use Image;
class imageController extends Controller
{
    public function Image(Request $request){
        $images=Images::paginate(5);
        $projects=Project::all('id','title');

        return view('admin.image',compact('images','projects'));
    }
    public function ImageAdd(imageRequest $request){
        $information = $request->except('_token');
        $project_id= $information['project_id'];
        $project=Project::where('id','=',$project_id)->get('title');
        $project_name=$project[0]['title'];
        $call_service= new ImageService();
        $insert = $call_service->ImageAdd($request,$project_name,$information);
        if ($insert) {
            return redirect()->back()->with('status-success', 'Yeni resim başarılı bir şekilde eklendi');

        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }
    public function ImageEdit(Request $request,$id){
        $projects=Project::all('id','title');
        $images=Images::paginate(5);
        $image_all_data = Images::where('id', '=', $id)->get('project_id');
        $photo='';
        $image_count= Images::where('id','=',$id)->count();
        $project_title=Project::where('id','=',$image_all_data[0]['project_id'])->get('title')[0]['title'];
        if ($image_count != 0) {
            $image_data = Images::where('id', '=', $id)->get();
            return view('admin.image_edit', compact('images','photo','image_data','projects','project_title'));
        } else {
            return redirect('admin.image');
        }

    }
    public function ImageUpdate(imageUpdateRequest $request)
    {
        $id = $request->route('id');
        $image_get = Images::where('id', '=', $id)->get();
        $project = Project::where('id', '=', $image_get[0]['project_id'])->get('title');
        $project_name = $project[0]['title'];
        $image_count = Images::where('id', '=', $id)->count();

        if ($image_count != 0) {
            $call_service = new ImageService();
            $update = $call_service->ImageUpdate($request, $image_get, $project_name, $id);
        if ($update) {
            return redirect()->back()->with('status-success', 'Resim başarılı bir şekilde güncellendi');
        }
        else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
        }
    else {
        return redirect('admin.image');

    }
    }
    public function ChangeStatus(Request $request)
    {
        $id = $request->imageID;
        $newStatus = null;
        $findExperience = Images::find($id);
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
    public function ImageDelete(Request $request,$id){
        $image_count = Images::where('id', '=', $id)->count();
        $data = Images::where('id', '=', $id)->get();
        if ($image_count != 0) {
            if($data[0]['image'] !== null) {
                File::delete($data[0]['image']);
            }
            $delete = Images::where('id', '=', $id)->delete();
            if($delete){
                return redirect('admin/resim')->with('status-success', 'Resim başarılı bir şekilde silindi');
            }
        }
        else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }
}
