<?php

namespace App\Imports;

use App\Models\Flooring;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FlooringImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Flooring([
            'floor' => [
                'en' => $row['floor_en'],
                'ar' => $row['floor_ar']
            ]
        ]);
    }

    public function rules(): array
    {
        return Flooring::createRule();
    }
}
