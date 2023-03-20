<?php

namespace App\Http\Traits;

trait SubAreaTrait
{
    private function getSubAreas()
    {
        return $this->subAreaModel::get();
    }

    private function findSubAreaById($id)
    {
        return $this->subAreaModel::find($id);
    }
}
