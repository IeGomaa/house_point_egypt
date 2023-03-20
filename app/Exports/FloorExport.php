<?php

namespace App\Exports;

use App\Models\Floor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FloorExport implements FromView, WithStyles
{

    public function view(): View
    {
        $floors = Floor::get('number');
        return view('pages.floor.export', compact('floors'));
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]]
        ];
    }
}
