<?php

namespace App\Http\Traits;

trait PropertyTrait
{
    private function getProperties()
    {
        return $this->propertyModel::with(['area', 'sub_area'])->get();
    }

    private function findPropertyById($id)
    {
        return $this->propertyModel::find($id);
    }
}
