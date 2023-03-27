<?php

namespace App\Http\Traits;

trait KeywordTrait
{
    private function getKeywords()
    {
        return $this->keywordModel::get();
    }

    private function findKeywordById($id)
    {
        return $this->keywordModel::find($id);
    }
}
