<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlooringNum\CheckFlooringNumIdRequest;
use App\Http\Requests\FlooringNum\CreateFlooringNumRequest;
use App\Http\Requests\FlooringNum\UpdateFlooringNumRequest;
use App\Http\Traits\FlooringNumTrait;
use App\Models\FlooringNum;
use RealRashid\SweetAlert\Facades\Alert;

class FlooringNumController extends Controller
{
    use FlooringNumTrait;
    private $flooringNumModel;
    public function __construct(FlooringNum $flooringNum)
    {
        $this->flooringNumModel = $flooringNum;
    }

    public function index()
    {
        $flooringNums = $this->getFlooringNums();
        return view('pages.flooringNum.index', compact('flooringNums'));
    }

    public function create()
    {
        return view('pages.flooringNum.create');
    }

    public function store(CreateFlooringNumRequest $request)
    {
        $this->flooringNumModel::create([
            'floor_num' => $request->floor_num
        ]);
        Alert::toast('Flooring Num Was Create Successfully', 'success');
        return redirect(route('admin.flooringNum.index'));
    }

    public function delete(CheckFlooringNumIdRequest $request)
    {
        $this->findFlooringNumById($request->id)->delete();
        Alert::toast('Flooring Num Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckFlooringNumIdRequest $request)
    {
        $flooringNum = $this->findFlooringNumById($request->id);
        return view('pages.flooringNum.edit', compact('flooringNum'));
    }

    public function update(UpdateFlooringNumRequest $request)
    {
        $this->findFlooringNumById($request->id)->update([
            'floor_num' => $request->floor_num
        ]);
        Alert::toast('Flooring Num Was Updated Successfully', 'success');
        return redirect(route('admin.flooringNum.index'));
    }
}
