<?php

namespace App\Http\Traits;

trait FlooringTrait
{
    private function getFloorings()
    {
        return $this->flooringModel::get();
    }

    private function findFlooringById($id)
    {
        return $this->flooringModel::find($id);
    }
}
