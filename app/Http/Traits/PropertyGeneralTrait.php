<?php

namespace App\Http\Traits;

trait PropertyGeneralTrait
{
    private function getPropertyGenerals()
    {
        return $this->propertyGeneralModel::get();
    }

    private function findPropertyGeneralById($id)
    {
        return $this->propertyGeneralModel::find($id);
    }
}
