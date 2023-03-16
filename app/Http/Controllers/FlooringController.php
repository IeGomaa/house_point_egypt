<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\CreateAreaRequest;
use App\Http\Requests\Area\DeleteAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Http\Requests\Flooring\CreateFlooringRequest;
use App\Http\Requests\Flooring\DeleteFlooringRequest;
use App\Http\Requests\Flooring\UpdateFlooringRequest;
use App\Http\Traits\AreaTrait;
use App\Http\Traits\FlooringTrait;
use App\Models\Area;
use App\Models\Flooring;

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
        return view('Pages.Flooring.index', compact('floorings'));
    }

    public function create()
    {
        return view('Pages.Flooring.create');
    }

    public function store(CreateFlooringRequest $request)
    {
        $this->flooringModel::create([
            'floor' => $request->floor
        ]);
        return redirect(route('flooring.index'));
    }

    public function delete(DeleteFlooringRequest $request)
    {
        $this->findFlooringById($request->id)->delete();
        return back();
    }

    public function edit(DeleteFlooringRequest $request)
    {
        $flooring = $this->findFlooringById($request->id);
        return view('Pages.Flooring.edit', compact('flooring'));
    }

    public function update(UpdateFlooringRequest $request)
    {
        $this->findFlooringById($request->id)->update([
            'floor' => $request->floor
        ]);
        return redirect(route('flooring.index'));
    }
}
