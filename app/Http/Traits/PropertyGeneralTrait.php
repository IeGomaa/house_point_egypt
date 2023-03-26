<?php

namespace App\Http\Traits;

trait PropertyGeneralTrait
{
    private function getPropertyGenerals()
    {
        return $this->propertyGeneralModel::with(['property', 'general'])->get();
    }

    private function findPropertyGeneralById($id)
    {
        return $this->propertyGeneralModel::find($id);
    }
}
