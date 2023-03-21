<?php

namespace App\Exports;

use App\Models\Area;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AreaExport implements FromView, WithStyles
{
    public function view(): View
    {
        $areas = Area::get('name');
        return view('pages.area.export', compact('areas'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1    => ['font' => ['bold' => true]]
        ];
    }
}
