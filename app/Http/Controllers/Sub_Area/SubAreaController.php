<?php

namespace App\Http\Controllers\Sub_Area;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubArea\CheckSubAreaIdRequest;
use App\Http\Requests\SubArea\CreateSubAreaRequest;
use App\Http\Requests\SubArea\UpdateSubAreaRequest;
use App\Http\Traits\AreaTrait;
use App\Http\Traits\SubAreaTrait;
use App\Models\Area;
use App\Models\SubArea;
use RealRashid\SweetAlert\Facades\Alert;

class SubAreaController extends Controller
{
    use SubAreaTrait, AreaTrait;
    private $areaModel;
    private $subAreaModel;
    public function __construct(SubArea $subArea, Area $area)
    {
        $this->subAreaModel = $subArea;
        $this->areaModel = $area;
    }

    public function index()
    {
        $subAreas = $this->getSubAreas();
        return view('pages.sub_area.index', compact('subAreas'));
    }

    public function create()
    {
        $areas = $this->getAreas();
        return view('pages.sub_area.create', compact('areas'));
    }

    public function store(CreateSubAreaRequest $request)
    {
        $this->subAreaModel::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'area_id' => $request->area_id
        ]);
        Alert::toast('Sub Area Was Created Successfully' , 'success');
        return redirect(route('admin.sub-area.index'));
    }

    public function delete(CheckSubAreaIdRequest $request)
    {
        $this->findSubAreaById($request->id)->delete();
        Alert::toast('Sub Area Was Deleted Successfully' , 'success');
        return back();
    }

    public function edit(CheckSubAreaIdRequest $request)
    {
        $sub_area = $this->findSubAreaById($request->id);
        $areas = $this->getAreas();
        return view('pages.sub_area.edit', compact('sub_area', 'areas'));
    }

    public function update(UpdateSubAreaRequest $request)
    {
        $this->findSubAreaById($request->id)->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'area_id' => $request->area_id
        ]);
        Alert::toast('Sub Area Was Updated Successfully' , 'success');
        return redirect(route('admin.sub-area.index'));
    }
}
