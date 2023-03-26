<?php

namespace App\Http\Traits;

trait PropertyImageTrait
{
    private function getPropertyImages()
    {
        return $this->propertyImageModel::get();
    }

    private function findPropertyImageById($id)
    {
        return $this->propertyImageModel::find($id);
    }
}
