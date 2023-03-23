<?php

namespace App\Imports;

use App\Models\Summary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SummaryImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Summary([
            'summary' => [
                'en' => $row['summary_en'],
                'ar' => $row['summary_ar']
            ]
        ]);
    }

    public function rules(): array
    {
        return Summary::createRule();
    }
}
