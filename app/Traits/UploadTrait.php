<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadTrait
{
    public function StoreImage(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
    {
        if ($request->hasFile($inputname)) {

            if (!$request->file($inputname)->isValid()) {

                flash('Invalid Image')->error();

                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);

            $name = Str::slug($request->input('name'));

            $filename = $name . '.' . $photo->getClientOriginalExtension();


            //insert Image in DB with Plolymorphic relationship
            $Image = new Image();

            $Image->name = $filename;

            $Image->imageable_id = $imageable_id;

            $Image->imageable_type = $imageable_type;

            $Image->save();

            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
        }
        return null;
    }
}
