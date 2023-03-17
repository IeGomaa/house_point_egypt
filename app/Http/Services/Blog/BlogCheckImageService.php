<?php

namespace App\Http\Services\Blog;

class BlogCheckImageService
{
    private $service;
    public function __construct(BlogUploadImageService $service)
    {
        $this->service = $service;
    }

    public function checkImage($image, $blog)
    {
        if (!is_null($image)) {
            return $this->service->uploadImage($image, $blog->image);
        }
        return $blog->getRawOriginal('image');
    }
}
