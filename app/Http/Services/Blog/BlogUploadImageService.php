<?php

namespace App\Http\Services\Blog;

class BlogUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $imageName = time() . '_blog.' . $file->extension();
        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/blog'), $imageName);
        return $imageName;
    }
}
