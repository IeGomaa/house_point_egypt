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
use RealRashid\SweetAlert\Facades\Alert;

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
        $property_generals = $this->getPropertyGenerals();
        return view('pages.property_general.index', compact('property_generals'));
    }

    public function create()
    {
        $properties = $this->getProperties();
        $generals = $this->getGenerals();
        return view('pages.property_general.create', compact('properties', 'generals'));
    }

    public function store(CreatePropertyGeneralRequest $request)
    {
        $this->propertyGeneralModel::create([
            'property_id' => $request->property_id,
            'general_id' => $request->general_id
        ]);
        Alert::toast('Property General Was Updated Successfully' , 'success');
        return redirect(route('admin.property-general.index'));
    }

    public function delete(CheckPropertyGeneralIdRequest $request): RedirectResponse
    {
        $this->findPropertyGeneralById($request->id)->delete();
        Alert::toast('Property General Was Deleted Successfully' , 'success');
        return back();
    }

    public function edit(CheckPropertyGeneralIdRequest $request)
    {
        $properties = $this->getProperties();
        $generals = $this->getGenerals();
        $property_general = $this->propertyGeneralModel::find($request->id);
        return view('pages.property_general.edit', compact('property_general', 'properties', 'generals'));
    }

    public function update(UpdatePropertyGeneralRequest $request)
    {
        $this->findPropertyGeneralById($request->id)->update([
            'property_id' => $request->property_id,
            'general_id' => $request->general_id
        ]);
        Alert::toast('Property General Was Updated Successfully' , 'success');
        return redirect(route('admin.property-general.index'));
    }
}
