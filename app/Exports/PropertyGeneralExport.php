<?php

namespace App\Exports;

use App\Models\PropertyGeneral;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PropertyGeneralExport implements FromView, WithStyles
{
    public function view(): View
    {
        $propertyGenerals = PropertyGeneral::with(['property', 'general'])->get(['property_id', 'general_id']);
        return view('pages.property_general.export', compact('propertyGenerals'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
