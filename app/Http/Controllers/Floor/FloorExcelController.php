<?php

namespace App\Http\Controllers\Floor;

use App\Exports\FloorExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Floor\FloorImportRequest;
use App\Imports\FloorImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FloorExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.floor.import');
    }

    public function import(FloorImportRequest $request)
    {
        Excel::import(new FloorImport, $request->floor);
        return redirect(route('admin.floor.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new FloorExport, 'floor.xlsx');
    }
}
