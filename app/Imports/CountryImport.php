<?php

namespace App\Imports;

use App\Models\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CountryImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Country([
            'name' => $row['name'],
            'iso' => $row['iso'],
            'country_code' => $row['country_code'],
            'phone_code' => $row['phone_code']
        ]);
    }

    public function rules(): array
    {
        return Country::createRule();
    }
}
