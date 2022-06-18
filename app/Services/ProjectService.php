<?php

namespace App\Services;

use App\Models\Project;
use File;
use Image;

class ProjectService
{
    public function ProjectImageAdd($request,$information)
    {
        if ($request['image'])
        {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $explode_filename = explode('.', $filename);
        $dir = 'projectphotos/';
        $path2 = public_path('projectphotos/' . $explode_filename[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        $path_last = Image::make($image->getRealPath())->resize(250, 250)->save($path2);
        $information['image'] = 'projectphotos' . '/' . $path_last->basename;
        }
        $insert = Project::create($information);
        return $insert;
    }
    public function ProjectImageUpdate($request, $image_get,$id)
    {
        $all = $request->except('_token');
        if($request->file('image') and $image_get[0]['image'] !== null)
        {
            File::delete($image_get[0]['image']);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $explode_filename = explode('.', $filename);
            $dir = 'projectphotos/';
            $path2 = public_path('projectphotos/' . $explode_filename[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
            $path_last = Image::make($image->getRealPath())->save($path2);
            $all['image'] = 'projectphotos' . '/' . $path_last->basename;

    }
        $update = Project::where('id', '=', $id)->update($all);
        return $update;
    }
    public function ProjectImageDelete($data,$image_delete_count,$image_delete,$video_delete_count,$video_delete,$id){
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
        return $delete;

    }
}
