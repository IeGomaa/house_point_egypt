<?php

namespace App\Http\Services\PropertyImage;

class PropertyImageUploadImageService
{
    public function uploadImage($file, $index = 0, $oldImage = null): string
    {
        $imageName = time(). $index . '_propertyImage.' . $file->extension();
        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/propertyImage'), $imageName);
        return $imageName;
    }
}
