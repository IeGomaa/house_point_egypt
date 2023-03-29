<?php

namespace App\Http\Controllers\Summary;

use App\Exports\SummaryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Summary\SummaryImportRequest;
use App\Imports\SummaryImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SummaryExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.summary.import');
    }

    public function import(SummaryImportRequest $request)
    {
        Excel::import(new SummaryImport, $request->summary);
        Alert::toast('Summary Excel Was Uploaded Successfully' , 'success');
        return redirect(route('admin.summary.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new SummaryExport, 'summary.xlsx');
    }
}
