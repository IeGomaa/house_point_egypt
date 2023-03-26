<?php

namespace App\Http\Services\PropertyImage;

class PropertyImageDeleteImageService
{
    public function deleteImageInLocal($image_name)
    {
        unlink(public_path($image_name));
    }
}
