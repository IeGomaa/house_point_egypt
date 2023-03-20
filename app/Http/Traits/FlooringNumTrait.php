<?php

namespace App\Http\Traits;

trait FlooringNumTrait
{
    private function getFlooringNums()
    {
        return $this->flooringNumModel::get();
    }

    private function findFlooringNumById($id)
    {
        return $this->flooringNumModel::find($id);
    }
}
