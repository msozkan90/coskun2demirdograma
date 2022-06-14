<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\imageRequest;
use App\Http\Requests\imageUpdateRequest;
use App\Models\Images;
use App\Models\Project;
use Illuminate\Http\Request;
use File;
use Image;
class imageController extends Controller
{
    public function image(Request $request){
        $images=Images::paginate(5);
        $projects=Project::all('id','title');

        return view('admin.image',compact('images','projects'));
    }

    public function image_add(imageRequest $request){
        $information = $request->except('_token');
        $project_id= $information['project_id'];
        $project=Project::where('id','=',$project_id)->get('title');
        $project_name=$project[0]['title'];

        if ($request['image'])
        {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $explode_filename = explode('.', $filename);
            $dir='photos/' . $project_name;
            $path2=public_path($dir . '/'. $explode_filename[0] . '_' .now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);
            if(!File::exists($dir))
            {
                File::makeDirectory($dir,0755,true);
            }

            $path_last = Image::make($image->getRealPath())->save($path2);

            $information['image']=$dir.'/'.$path_last->basename;


        }
        $insert = Images::create($information);
        if ($insert) {
            return redirect()->back()->with('status-success', 'Yeni resim başarılı bir şekilde eklendi');

        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
        }
    }

    public function image_edit(Request $request,$id){
        $projects=Project::all('id','title');
        $images=Images::paginate(5);
        $c = Images::where('id', '=', $id)->where('id','=',$id)->count();
        $image_all_data = Images::where('id', '=', $id)->where('id','=',$id)->get('project_id');
        $photo='';
        $image_count= Images::where('id','=',$id)->count();
        if ($image_count){
            $image_data= Images::where('id','=',$id)->get('image');
            $project_title=Project::where('id','=',$image_all_data[0]['project_id'])->get('title')[0]['title'];
        }
        if ($c != 0) {
            $image_data = Images::where('id', '=', $id)->get();
            return view('admin.image_edit', compact('images','photo','image_data','projects','project_title'));
        } else {
            return redirect('admin.image');
        }

    }

    public function image_update(imageUpdateRequest $request){
        $id = $request->route('id');
        $image_get = Images::where('id', '=', $id)->get();
        $project=Project::where('id','=',$image_get[0]['project_id'])->get('title');
        $project_name=$project[0]['title'];
        $c = Images::where('id', '=', $id)->count();

        if ($c != 0) {
            $all = $request->except('_token');
            if($request->file('image'))
            {
                File::delete($image_get[0]['image']);
                $image       = $request->file('image');
                $filename    = $image->getClientOriginalName();
                $explode_filename = explode('.', $filename);
                $dir='photos/' . $project_name;
                $path2=public_path($dir . '/' . $explode_filename[0] . '_' .now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);

                if(!File::exists($dir))
                {
                    File::makeDirectory($dir,0755,true);
                }
                $path_last = Image::make($image->getRealPath())->save($path2);
                $all['image']=$dir. '/' . $path_last->basename;
            }

            $update = Images::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status-success', 'Resim başarılı bir şekilde güncellendi');

            } else {
                return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');
            }

        }
        else {
            return redirect('admin.image');
        }
    }


    public function changeStatus(Request $request)
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

    public function image_delete(Request $request,$id){
        $c = Images::where('id', '=', $id)->count();
        $data = Images::where('id', '=', $id)->get();
        if ($c != 0) {
            if($data[0]['image'] !== null) {
                File::delete($data[0]['image']);
            }
            $delete = Images::where('id', '=', $id)->delete();
            if($delete){
                return redirect('admin/resim')->with('status-success', 'Resim başarılı bir şekilde silindi');
            }
        } else {
            return redirect()->back()->with('status-danger', 'Bir sorun oluştu!');

        }

    }


}
