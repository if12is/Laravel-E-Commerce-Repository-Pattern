<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImageUpload
{
    public static function upload($request, $width = null, $height = null,  $path = null)
    {
        $imagename = Str::uuid() . date('YmdHis') . '-' . $request->getClientOriginalName();
        [$widthDefault, $heightDefault] = getimagesize($request);
        $width = $width ?? $widthDefault;
        $height = $height ?? $heightDefault;
        $image = Image::make($request->path());
        $image->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        })->stream();
        Storage::disk('images')->put($path . $imagename, $image);
        return  $path . $imagename;
    }
}
