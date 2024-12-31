<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;

trait UploadFileTrait
{
    public function uploadfile(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
    {
        if ($request->hasFile($inputname)) {
            if ($request->file($inputname)->isValid()) {
                return " the file is not valid";
            }
            $photo = $request->file($inputname);
            $name = Str::slug($request->input('name'));
            $filename = $name . '.' . $photo->getClientOriginalExtension();

            $image = new Image();
            $image->filename = $filename;
            $image->imageable_id = $imageable_id;
            $image->imageable_type = $imageable_type;
            $image->save();

            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
            // getClientOriginalExtension();
        }
        return null;
    }
}
