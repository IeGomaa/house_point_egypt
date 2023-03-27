<?php

namespace App\Http\Traits;

trait LinkTrait
{
    private function getLinks()
    {
        return $this->linkModel::get();
    }

    private function findLinkById($id)
    {
        return $this->linkModel::find($id);
    }
}
