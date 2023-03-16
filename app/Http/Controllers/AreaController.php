<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\CreateAreaRequest;
use App\Http\Requests\Area\DeleteAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Http\Traits\AreaTrait;
use App\Models\Area;

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
        return view('Pages.Area.index', compact('areas'));
    }

    public function create()
    {
        return view('Pages.Area.create');
    }

    public function store(CreateAreaRequest $request)
    {
        $this->areaModel::create([
            'name' => $request->name
        ]);
        return redirect(route('area.index'));
    }

    public function delete(DeleteAreaRequest $request)
    {
        $this->findAreaById($request->id)->delete();
        return back();
    }

    public function edit(DeleteAreaRequest $request)
    {
        $area = $this->findAreaById($request->id);
        return view('Pages.Area.edit', compact('area'));
    }

    public function update(UpdateAreaRequest $request)
    {
        $this->findAreaById($request->id)->update([
            'name' => $request->name
        ]);
        return redirect(route('area.index'));
    }
}
