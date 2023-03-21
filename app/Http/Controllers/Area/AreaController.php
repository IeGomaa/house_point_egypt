<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Http\Requests\Area\CheckAreaIdRequest;
use App\Http\Requests\Area\CreateAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Http\Traits\AreaTrait;
use App\Models\Area;
use RealRashid\SweetAlert\Facades\Alert;

class AreaController extends Controller
{
    private $areaModel;
    use AreaTrait;
    public function __construct(Area $area)
    {
        $this->areaModel = $area;
    }

    public function index()
    {
        $areas = $this->getAreas();
        return view('pages.area.index', compact('areas'));
    }

    public function create()
    {
        return view('pages.area.create');
    }

    public function store(CreateAreaRequest $request)
    {
        $this->areaModel::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]
        ]);
        Alert::toast('Area Was Created Successfully', 'success');
        return redirect(route('admin.area.index'));
    }

    public function delete(CheckAreaIdRequest $request)
    {
        $this->findAreaById($request->id)->delete();
        Alert::toast('Area Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckAreaIdRequest $request)
    {
        $area = $this->findAreaById($request->id);
        return view('pages.area.edit', compact('area'));
    }

    public function update(UpdateAreaRequest $request)
    {
        $this->findAreaById($request->id)->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]
        ]);
        Alert::toast('Area Was Updated Successfully', 'success');
        return redirect(route('admin.area.index'));
    }
}
