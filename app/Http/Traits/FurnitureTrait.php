<?php

namespace App\Http\Traits;

trait FurnitureTrait
{
    private function getFurnitures()
    {
        return $this->furnitureModel::get();
    }

    private function findFurnitureById($id)
    {
        return $this->furnitureModel::find($id);
    }
}
