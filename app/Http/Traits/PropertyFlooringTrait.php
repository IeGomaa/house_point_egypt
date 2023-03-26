<?php

namespace App\Http\Traits;

trait PropertyFlooringTrait
{
    private function getPropertyFlooring()
    {
        return $this->propertyFlooringModel::with(['property', 'flooring'])->get();
    }

    private function findPropertyFlooringById($id)
    {
        return $this->propertyFlooringModel::find($id);
    }
}
