<?php

namespace App\Http\Controllers\Country;

use App\Exports\CountryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryImportRequest;
use App\Imports\CountryImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CountryExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.country.import');
    }

    public function import(CountryImportRequest $request)
    {
        Excel::import(new CountryImport, $request->country);
        Alert::toast('Country Excel Was Uploaded Successfully' , 'success');
        return redirect(route('admin.country.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new CountryExport, 'country.xlsx');
    }
}
