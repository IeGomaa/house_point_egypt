<?php

namespace App\Http\Controllers\Property_Type;

use App\Exports\PropertyTypeExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyType\PropertyTypeImportRequest;
use App\Imports\PropertyTypeImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PropertyTypeExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.property_type.import');
    }

    public function import(PropertyTypeImportRequest $request)
    {
        Excel::import(new PropertyTypeImport, $request->property_type);
        Alert::toast('Property Type Excel Was Uploaded Successfully' , 'success');
        return redirect(route('admin.property-type.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new PropertyTypeExport, 'property_type.xlsx');
    }
}
