<?php

namespace App\Http\Services\Blog;

class BlogDeleteImageService
{
    public function deleteImageInLocal($image_name)
    {
        unlink(public_path($image_name));
    }
}
