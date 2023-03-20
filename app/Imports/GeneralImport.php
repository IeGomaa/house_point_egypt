<?php

namespace App\Imports;

use App\Models\General;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class GeneralImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new General([
            'name' => $row['name']
        ]);
    }

    public function rules(): array
    {
        return General::createRule();
    }
}
