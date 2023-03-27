<?php

namespace App\Imports;

use App\Models\PropertyGeneral;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PropertyGeneralImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PropertyGeneral([
            'property_id' => $row['property_id'],
            'general_id' => $row['general_id']
        ]);
    }

    public function rules(): array
    {
        return PropertyGeneral::createRule();
    }
}
