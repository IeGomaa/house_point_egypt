<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\CreateAreaRequest;
use App\Http\Requests\General\CheckGeneralIdRequest;
use App\Http\Requests\General\UpdateGeneralRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\General;

class GeneralController extends Controller
{
    private $generalModel;
    use GeneralTrait;
    public function __construct(General $general)
    {
        $this->generalModel = $general;
    }

    public function index()
    {
        $generals = $this->getGenerals();
        return view('pages.general.index', compact('generals'));
    }

    public function create()
    {
        return view('pages.general.create');
    }

    public function store(CreateAreaRequest $request)
    {
        $this->generalModel::create([
            'name' => $request->name
        ]);
        return redirect(route('admin.general.index'));
    }

    public function delete(CheckGeneralIdRequest $request)
    {
        $this->findGeneralById($request->id)->delete();
        return back();
    }

    public function edit(CheckGeneralIdRequest $request)
    {
        $general = $this->findGeneralById($request->id);
        return view('pages.general.edit', compact('general'));
    }

    public function update(UpdateGeneralRequest $request)
    {
        $this->findGeneralById($request->id)->update([
            'name' => $request->name
        ]);
        return redirect(route('admin.general.index'));
    }
}
