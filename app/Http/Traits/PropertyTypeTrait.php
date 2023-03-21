<?php

namespace App\Http\Traits;

trait PropertyTypeTrait
{
    private function getPropertyTypes()
    {
        return $this->propertyTypeModel::get();
    }

    private function findPropertyTypeById($id)
    {
        return $this->propertyTypeModel::find($id);
    }
}
