<?php

namespace App\Exports;

use App\Models\Flooring;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FlooringExport implements FromView, WithStyles
{

    public function view(): View
    {
        $floorings = Flooring::get('floor');
        return view('pages.flooring.export', compact('floorings'));
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]]
        ];
    }
}
