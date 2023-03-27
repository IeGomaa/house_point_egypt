<?php

namespace App\Exports;

use App\Models\PropertySummary;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PropertySummaryExport implements FromView, WithStyles
{
    public function view(): View
    {
        $propertySummaries = PropertySummary::with(['property', 'summary'])->get(['property_id', 'summary_id']);
        return view('pages.property_summary.export', compact('propertySummaries'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
