<?php

namespace App\Http\Traits;

trait SummaryTrait
{
    private function getSummaries()
    {
        return $this->summaryModel::get();
    }

    private function findSummaryById($id)
    {
        return $this->summaryModel::find($id);
    }
}
