<?php

namespace App\Http\Controllers\General;

use App\Exports\GeneralExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\GeneralImportRequest;
use App\Imports\GeneralImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GeneralExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.general.import');
    }

    public function import(GeneralImportRequest $request)
    {
        Excel::import(new GeneralImport, $request->general);
        Alert::toast('General Excel Was Uploaded Successfully' , 'success');
        return redirect(route('admin.general.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new GeneralExport, 'general.xlsx');
    }
}
