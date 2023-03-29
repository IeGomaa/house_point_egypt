<?php

namespace App\Http\Controllers\Property;

use App\Exports\PropertyExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyImportRequest;
use App\Imports\PropertyImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PropertyExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.property.import');
    }

    public function import(PropertyImportRequest $request)
    {
        Excel::import(new PropertyImport, $request->property);
        Alert::toast('Property Excel Was Uploaded Successfully' , 'success');
        return redirect(route('admin.property.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new PropertyExport, 'property.xlsx');
    }
}
