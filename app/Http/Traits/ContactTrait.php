<?php

namespace App\Http\Traits;

trait ContactTrait
{
    private function getContacts()
    {
        return $this->contactModel::get();
    }

    private function findContactById($id)
    {
        return $this->contactModel::find($id);
    }
}
