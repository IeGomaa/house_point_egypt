<?php

namespace App\Http\Controllers\Property_General;

use App\Exports\GeneralExport;
use App\Exports\PropertyGeneralExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\GeneralImportRequest;
use App\Http\Requests\PropertyGeneralImportRequest;
use App\Imports\GeneralImport;
use App\Imports\PropertyGeneralImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PropertyGeneralExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.property_general.import');
    }

    public function import(PropertyGeneralImportRequest $request)
    {
        Excel::import(new PropertyGeneralImport, $request->property_general);
        Alert::toast('Property General Excel Was Uploaded Successfully' , 'success');
        return redirect(route('admin.property-general.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new PropertyGeneralExport, 'property_general.xlsx');
    }
}
