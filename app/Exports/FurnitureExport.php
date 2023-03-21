<?php

namespace App\Exports;

use App\Models\Furniture;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FurnitureExport implements FromView, WithStyles
{

    public function view(): View
    {
        $furniture = Furniture::get('furniture');
        return view('pages.furniture.export', compact('furniture'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1    => ['font' => ['bold' => true]]
        ];
    }
}
