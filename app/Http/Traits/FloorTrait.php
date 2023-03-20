<?php

namespace App\Http\Traits;

trait FloorTrait
{
    private function getFloors()
    {
        return $this->floorModel::get();
    }

    private function findFloorById($id)
    {
        return $this->floorModel::find($id);
    }
}
