<?php

namespace App\Exports;

use App\Models\Summary;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SummaryExport implements FromView, WithStyles
{
    public function view(): View
    {
        $summaries = Summary::get('summary');
        return view('pages.summary.export', compact('summaries'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
