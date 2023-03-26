<?php

namespace App\Http\Traits;

trait PropertyFlooringTrait
{
    private function getPropertyFlooring()
    {
        return $this->propertyFlooringModel::get();
    }

    private function findPropertyFlooringById($id)
    {
        return $this->propertyFlooringModel::find($id);
    }
}
