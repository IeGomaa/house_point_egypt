<?php

namespace App\Exports;

use App\Models\PropertyFlooring;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PropertyFlooringExport implements FromView, WithStyles
{
    public function view(): View
    {
        $propertyFlooring = PropertyFlooring::with(['property', 'flooring'])->get(['property_id', 'flooring_id']);
        return view('pages.property_flooring.export', compact('propertyFlooring'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
