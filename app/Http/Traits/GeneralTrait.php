<?php

namespace App\Http\Traits;

trait GeneralTrait
{
    private function getGenerals()
    {
        return $this->generalModel::get();
    }

    private function findGeneralById($id)
    {
        return $this->generalModel::find($id);
    }
}
