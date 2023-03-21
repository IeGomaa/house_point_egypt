<?php

namespace App\Imports;

use App\Models\Furniture;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FurnitureImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Furniture([
            'furniture' => [
                'en' => $row['furniture_en'],
                'ar' => $row['furniture_ar']
            ]
        ]);
    }

    public function rules(): array
    {
        return Furniture::createRule();
    }
}
