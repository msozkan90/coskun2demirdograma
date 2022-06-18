<?php

namespace App\Services;
use App\Models\Video;
use File;
class VideoService
{
    public function VideoAdd($request,$project_name,$information)
    {
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
        return $insert;
    }
    public function VideoUpdate($request,$video_get,$project_name,$id){

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
            $all['project_id'] = $request['project_id'];
            $update = Video::where('id', '=', $id)->update($all);
            return $update;
    }
}
