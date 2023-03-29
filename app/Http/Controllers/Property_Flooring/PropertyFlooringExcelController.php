<?php

namespace App\Http\Controllers\Property_Flooring;

use App\Exports\PropertyFlooringExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFlooringImportRequest;
use App\Imports\PropertyFlooringImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PropertyFlooringExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.property_flooring.import');
    }

    public function import(PropertyFlooringImportRequest $request)
    {
        Excel::import(new PropertyFlooringImport, $request->property_flooring);
        Alert::toast('Property Flooring Excel Was Uploaded Successfully' , 'success');
        return redirect(route('admin.property-flooring.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new PropertyFlooringExport, 'property_flooring.xlsx');
    }
}
