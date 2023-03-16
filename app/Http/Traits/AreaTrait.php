<?php

namespace App\Http\Traits;

trait AreaTrait
{
    private function getAreas()
    {
        return $this->areaModel::get();
    }

    private function findAreaById($id)
    {
        return $this->areaModel::find($id);
    }
}
