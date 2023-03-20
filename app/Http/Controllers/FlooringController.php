<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\CreateAreaRequest;
use App\Http\Requests\Area\CheckAreaIdRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Http\Requests\Flooring\CreateFlooringRequest;
use App\Http\Requests\Flooring\CheckFlooringIdRequest;
use App\Http\Requests\Flooring\UpdateFlooringRequest;
use App\Http\Traits\AreaTrait;
use App\Http\Traits\FlooringTrait;
use App\Models\Area;
use App\Models\Flooring;
use RealRashid\SweetAlert\Facades\Alert;

class FlooringController extends Controller
{
    private $flooringModel;
    use FlooringTrait;
    public function __construct(Flooring $flooring)
    {
        $this->flooringModel = $flooring;
    }

    public function index()
    {
        $floorings = $this->getFloorings();
        return view('pages.flooring.index', compact('floorings'));
    }

    public function create()
    {
        return view('pages.flooring.create');
    }

    public function store(CreateFlooringRequest $request)
    {
        $this->flooringModel::create([
            'floor' => $request->floor
        ]);
        Alert::toast('Flooring Was Created Successfully', 'success');
        return redirect(route('admin.flooring.index'));
    }

    public function delete(CheckFlooringIdRequest $request)
    {
        $this->findFlooringById($request->id)->delete();
        Alert::toast('Flooring Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckFlooringIdRequest $request)
    {
        $flooring = $this->findFlooringById($request->id);
        return view('pages.flooring.edit', compact('flooring'));
    }

    public function update(UpdateFlooringRequest $request)
    {
        $this->findFlooringById($request->id)->update([
            'floor' => $request->floor
        ]);
        Alert::toast('Flooring Was Updated Successfully', 'success');
        return redirect(route('admin.flooring.index'));
    }
}
