<?php

namespace App\Imports;

use App\Models\PropertyType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PropertyTypeImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PropertyType([
            'type' => [
                'en' => $row['type_en'],
                'ar' => $row['type_ar'],
            ]
        ]);
    }

    public function rules(): array
    {
        return  PropertyType::createRule();
    }
}
