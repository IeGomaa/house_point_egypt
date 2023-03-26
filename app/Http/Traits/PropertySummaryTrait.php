<?php

namespace App\Http\Traits;

trait PropertySummaryTrait
{
    private function getPropertySummaries()
    {
        return $this->propertySummaryModel::get();
    }

    private function findPropertySummaryById($id)
    {
        return $this->propertySummaryModel::find($id);
    }
}
