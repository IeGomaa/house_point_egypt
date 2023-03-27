<?php

namespace App\Http\Controllers\Property_Summary;

use App\Exports\PropertyFlooringExport;
use App\Exports\PropertySummaryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFlooringImportRequest;
use App\Http\Requests\PropertySummaryImportRequest;
use App\Imports\PropertyFlooringImport;
use App\Imports\PropertySummaryImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PropertySummaryExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.property_summary.import');
    }

    public function import(PropertySummaryImportRequest $request)
    {
        Excel::import(new PropertySummaryImport, $request->property_summary);
        return redirect(route('admin.property-summary.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new PropertySummaryExport, 'property_summary.xlsx');
    }
}
