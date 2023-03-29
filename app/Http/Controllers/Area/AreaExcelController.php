<?php

namespace App\Http\Controllers\Area;

use App\Exports\AreaExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Area\AreaImportRequest;
use App\Imports\AreaImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AreaExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.area.import');
    }

    public function import(AreaImportRequest $request)
    {
        Excel::import(new AreaImport, $request->area);
        Alert::toast('Area Excel Was Uploaded Successfully' , 'success');
        return redirect(route('admin.area.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new AreaExport, 'area.xlsx');
    }
}
