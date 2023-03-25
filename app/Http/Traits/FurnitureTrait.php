<?php

namespace App\Http\Traits;

trait FurnitureTrait
{
    private function getFurniture()
    {
        return $this->furnitureModel::get();
    }

    private function findFurnitureById($id)
    {
        return $this->furnitureModel::find($id);
    }
}
