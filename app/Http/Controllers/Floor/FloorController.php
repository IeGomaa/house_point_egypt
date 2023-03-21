<?php

namespace App\Http\Controllers\Floor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Floor\CheckFloorIdRequest;
use App\Http\Requests\Floor\CreateFloorRequest;
use App\Http\Requests\Floor\UpdateFloorRequest;
use App\Http\Traits\FloorTrait;
use App\Models\Floor;
use RealRashid\SweetAlert\Facades\Alert;

class FloorController extends Controller
{
    use FloorTrait;
    private $floorModel;
    public function __construct(Floor $floor)
    {
        $this->floorModel = $floor;
    }

    public function index()
    {
        $floors = $this->getFloors();
        return view('pages.floor.index', compact('floors'));
    }

    public function create()
    {
        return view('pages.floor.create');
    }

    public function store(CreateFloorRequest $request)
    {
        $this->floorModel::create([
            'number' => [
                'en' => $request->number_en,
                'ar' => $request->number_ar
            ]
        ]);
        Alert::toast('Floor Number Was Create Successfully', 'success');
        return redirect(route('admin.floor.index'));
    }

    public function delete(CheckFloorIdRequest $request)
    {
        $this->findFloorById($request->id)->delete();
        Alert::toast('Floor Number Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckFloorIdRequest $request)
    {
        $floor = $this->findFloorById($request->id);
        return view('pages.floor.edit', compact('floor'));
    }

    public function update(UpdateFloorRequest $request)
    {
        $this->findFloorById($request->id)->update([
            'number' => [
                'en' => $request->number_en,
                'ar' => $request->number_ar
            ]
        ]);
        Alert::toast('Floor Number Was Updated Successfully', 'success');
        return redirect(route('admin.floor.index'));
    }
}
