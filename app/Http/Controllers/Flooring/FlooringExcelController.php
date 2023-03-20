<?php

namespace App\Http\Controllers\Flooring;

use App\Exports\FlooringExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Flooring\FlooringImportRequest;
use App\Imports\FlooringImport;
use Maatwebsite\Excel\Facades\Excel;

class FlooringExcelController extends Controller
{

    public function import_page()
    {
        return view('pages.flooring.import');
    }

    public function import(FlooringImportRequest $request)
    {
        Excel::import(new FlooringImport, $request->flooring);
        return redirect(route('admin.flooring.index'));
    }

    public function export()
    {
        return Excel::download(new FlooringExport, 'flooring.xlsx');
    }
}
