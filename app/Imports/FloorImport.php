<?php

namespace App\Imports;

use App\Models\Floor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FloorImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Floor([
            'number' => [
                'en' => $row['number_en'],
                'ar' => $row['number_ar'],
            ]
        ]);
    }

    public function rules(): array
    {
        return  Floor::createRule();
    }
}
