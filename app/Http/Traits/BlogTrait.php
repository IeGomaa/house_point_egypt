<?php

namespace App\Http\Traits;

trait BlogTrait
{
    private function getBlogs()
    {
        return $this->blogModel::get();
    }

    private function findBlogById($id)
    {
        return $this->blogModel::find($id);
    }
}
