<?php

namespace App\Imports;

use App\Models\PropertySummary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PropertySummaryImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PropertySummary([
            'property_id' => $row['property_id'],
            'summary_id' => $row['summary_id']
        ]);
    }

    public function rules(): array
    {
        return PropertySummary::createRule();
    }
}
