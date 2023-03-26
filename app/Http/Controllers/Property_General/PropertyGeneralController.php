<?php

namespace App\Http\Controllers\Property_General;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyGeneral\CheckPropertyGeneralIdRequest;
use App\Http\Requests\PropertyGeneral\CreatePropertyGeneralRequest;
use App\Http\Requests\PropertyGeneral\UpdatePropertyGeneralRequest;
use App\Http\Traits\GeneralTrait;
use App\Http\Traits\PropertyGeneralTrait;
use App\Http\Traits\PropertyTrait;
use App\Models\General;
use App\Models\Property;
use App\Models\PropertyGeneral;
use Illuminate\Http\RedirectResponse;

class PropertyGeneralController extends Controller
{
    private $propertyGeneralModel;
    private $propertyModel;
    private $generalModel;
    use PropertyGeneralTrait, PropertyTrait, GeneralTrait;
    public function __construct(Property $property, General $general, PropertyGeneral $propertyGeneral)
    {
        $this->propertyModel = $property;
        $this->generalModel = $general;
        $this->propertyGeneralModel = $propertyGeneral;
    }

    public function index()
    {
        $property_generals = $this->propertyGeneralModel::with(['property', 'general'])->get();
        return view('pages.property_general.index', compact('property_generals'));
    }

    public function create()
    {
        $properties = $this->propertyModel::get();
        $generals = $this->generalModel::get();
        return view('pages.property_general.create', compact('properties', 'generals'));
    }

    public function store(CreatePropertyGeneralRequest $request)
    {
        $this->propertyGeneralModel::create([
            'property_id' => $request->property_id,
            'general_id' => $request->general_id
        ]);
        return redirect(route('admin.property-general.index'));
    }

    public function delete(CheckPropertyGeneralIdRequest $request): RedirectResponse
    {
        $this->propertyGeneralModel::find($request->id)->delete();
        return back();
    }

    public function edit(CheckPropertyGeneralIdRequest $request)
    {
        $properties = $this->propertyModel::get();
        $generals = $this->generalModel::get();
        $property_general = $this->propertyGeneralModel::find($request->id);
        return view('pages.property_general.edit', compact('property_general', 'properties', 'generals'));
    }

    public function update(UpdatePropertyGeneralRequest $request)
    {
        $this->propertyGeneralModel::find($request->id)->update([
            'property_id' => $request->property_id,
            'general_id' => $request->general_id
        ]);
        return redirect(route('admin.property-general.index'));
    }
}
