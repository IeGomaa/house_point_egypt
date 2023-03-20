<?php

namespace App\Http\Controllers;

use App\Http\Requests\Furniture\CheckFurnitureIdRequest;
use App\Http\Requests\Furniture\CreateFurnitureRequest;
use App\Http\Requests\Furniture\UpdateFurnitureRequest;
use App\Http\Traits\FurnitureTrait;
use App\Models\Furniture;
use RealRashid\SweetAlert\Facades\Alert;

class FurnitureController extends Controller
{
    use FurnitureTrait;
    private $furnitureModel;
    public function __construct(Furniture $furniture)
    {
        $this->furnitureModel = $furniture;
    }

    public function index()
    {
        $furnitures = $this->getFurnitures();
        return view('pages.furniture.index', compact('furnitures'));
    }

    public function create()
    {
        return view('pages.furniture.create');
    }

    public function store(CreateFurnitureRequest $request)
    {
        $this->furnitureModel::create([
            'furniture' => $request->furniture
        ]);
        Alert::toast('Furniture Num Was Created Successfully', 'success');
        return redirect(route('admin.furniture.index'));
    }

    public function delete(CheckFurnitureIdRequest $request)
    {
        $this->findFurnitureById($request->id)->delete();
        Alert::toast('Furniture Num Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckFurnitureIdRequest $request)
    {
        $furniture = $this->findFurnitureById($request->id);
        return view('pages.furniture.edit', compact('furniture'));
    }

    public function update(UpdateFurnitureRequest $request)
    {
        $this->findFurnitureById($request->id)->update([
            'furniture' => $request->furniture
        ]);
        Alert::toast('Furniture Num Was Updated Successfully', 'success');
        return redirect(route('admin.furniture.index'));
    }
}