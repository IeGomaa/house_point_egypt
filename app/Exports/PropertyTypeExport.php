<?php

namespace App\Exports;

use App\Models\PropertyType;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PropertyTypeExport implements FromView, WithStyles
{
    public function view(): View
    {
        $property_types = PropertyType::get('type');
        return view('pages.property_type.export', compact('property_types'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1    => ['font' => ['bold' => true]]
        ];
    }
}
