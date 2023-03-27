<?php

namespace App\Exports;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CountryExport implements FromView, WithStyles
{
    public function view(): View
    {
        $countries = Country::get(['name', 'iso', 'country_code', 'phone_code']);
        return view('pages.country.export', compact('countries'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
