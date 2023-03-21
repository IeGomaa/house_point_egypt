<?php

namespace App\Http\Controllers\Property_Type;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyType\CheckPropertyTypeIdRequest;
use App\Http\Requests\PropertyType\CreatePropertyTypeRequest;
use App\Http\Requests\PropertyType\UpdatePropertyTypeRequest;
use App\Http\Traits\PropertyTypeTrait;
use App\Models\PropertyType;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyTypeController extends Controller
{
    private $propertyTypeModel;
    use PropertyTypeTrait;
    public function __construct(PropertyType $propertyType)
    {
        $this->propertyTypeModel = $propertyType;
    }

    public function index()
    {
        $property_types = $this->getPropertyTypes();
        return view('pages.property_type.index', compact('property_types'));
    }

    public function create()
    {
        return view('pages.property_type.create');
    }

    public function store(CreatePropertyTypeRequest $request)
    {
        $this->propertyTypeModel::create([
            'type' => [
                'en' => $request->type_en,
                'ar' => $request->type_ar,
            ]
        ]);
        Alert::toast('Property Type Was Created Successfully', 'success');
        return redirect(route('admin.property-type.index'));
    }

    public function delete(CheckPropertyTypeIdRequest $request)
    {
        $this->findPropertyTypeById($request->id)->delete();
        Alert::toast('Property Type Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckPropertyTypeIdRequest $request)
    {
        $property_type = $this->findPropertyTypeById($request->id);
        return view('pages.property_type.edit', compact('property_type'));
    }

    public function update(UpdatePropertyTypeRequest $request)
    {
        $this->findPropertyTypeById($request->id)->update([
            'type' => [
                'en' => $request->type_en,
                'ar' => $request->type_ar,
            ]
        ]);
        Alert::toast('Property Type Was Updated Successfully', 'success');
        return redirect(route('admin.property-type.index'));
    }
}
