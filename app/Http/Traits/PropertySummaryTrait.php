<?php

namespace App\Http\Traits;

trait PropertySummaryTrait
{
    private function getPropertySummaries()
    {
        return $this->propertySummaryModel::with(['property', 'summary'])->get();
    }

    private function findPropertySummaryById($id)
    {
        return $this->propertySummaryModel::find($id);
    }
}
