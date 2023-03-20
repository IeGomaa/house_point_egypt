<?php

namespace App\Http\Controllers;

use App\Http\Requests\Floor\CheckFloorIdRequest;
use App\Http\Requests\Floor\CreateFloorRequest;
use App\Http\Requests\Floor\UpdateFloorRequest;
use App\Http\Traits\FlooringNumTrait;
use App\Models\FlooringNum;
use RealRashid\SweetAlert\Facades\Alert;

class FloorController extends Controller
{
    use FlooringNumTrait;
    private $flooringNumModel;
    public function __construct(FlooringNum $flooringNum)
    {
        $this->flooringNumModel = $flooringNum;
    }

    public function index()
    {
        $floors = $this->getFlooringNums();
        return view('pages.floor.index', compact('floors'));
    }

    public function create()
    {
        return view('pages.floor.create');
    }

    public function store(CreateFloorRequest $request)
    {
        $this->flooringNumModel::create([
            'number' => $request->number
        ]);
        Alert::toast('Floor Number Was Create Successfully', 'success');
        return redirect(route('admin.floor.index'));
    }

    public function delete(CheckFloorIdRequest $request)
    {
        $this->findFlooringNumById($request->id)->delete();
        Alert::toast('Floor Number Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckFloorIdRequest $request)
    {
        $floor = $this->findFlooringNumById($request->id);
        return view('pages.floor.edit', compact('floor'));
    }

    public function update(UpdateFloorRequest $request)
    {
        $this->findFlooringNumById($request->id)->update([
            'number' => $request->number
        ]);
        Alert::toast('Floor Number Was Updated Successfully', 'success');
        return redirect(route('admin.floor.index'));
    }
}
