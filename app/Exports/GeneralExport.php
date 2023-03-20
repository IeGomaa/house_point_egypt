<?php

namespace App\Exports;

use App\Models\General;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GeneralExport implements FromView, WithStyles
{

    public function view(): View
    {
        $generals = General::get('name');
        return view('pages.general.export', compact('generals'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
