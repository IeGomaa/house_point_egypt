<?php

namespace App\Http\Controllers\Furniture;

use App\Exports\FurnitureExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Furniture\FurnitureImportRequest;
use App\Imports\FurnitureImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FurnitureExcelController extends Controller
{
    public function import_page()
    {
        return view('pages.furniture.import');
    }

    public function import(FurnitureImportRequest $request)
    {
        Excel::import(new FurnitureImport, $request->furniture);
        return redirect(route('admin.furniture.index'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new FurnitureExport, 'furniture.xlsx');
    }
}
