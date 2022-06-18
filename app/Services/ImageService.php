<?php

namespace App\Services;

use App\Models\Images;
use File;
use Image;
class ImageService
{
    public function ImageAdd($request, $project_name, $information)
    {
        if ($request['image']) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $explode_filename = explode('.', $filename);
            $dir = 'photos/' . $project_name;
            $path2 = public_path($dir . '/' . $explode_filename[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }

            $path_last = Image::make($image->getRealPath())->save($path2);

            $information['image'] = $dir . '/' . $path_last->basename;
        }
        $insert = Images::create($information);

        return $insert;
    }
    public function ImageUpdate($request, $image_get, $project_name, $id)
    {

            $all = $request->except('_token');
            if ($request->file('image')) {
                File::delete($image_get[0]['image']);
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $explode_filename = explode('.', $filename);
                $dir = 'photos/' . $project_name;
                $path2 = public_path($dir . '/' . $explode_filename[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $explode_filename[1]);

                if (!File::exists($dir)) {
                    File::makeDirectory($dir, 0755, true);
                }
                $path_last = Image::make($image->getRealPath())->save($path2);
                $all['image'] = $dir . '/' . $path_last->basename;
            }
            $all['project_id'] = $image_get[0]['project_id'];
            $update = Images::where('id', '=', $id)->update($all);
        }
}
