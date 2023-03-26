<?php

namespace App\Http\Controllers\Property_Flooring;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFlooring\CheckPropertyFlooringIdRequest;
use App\Http\Requests\PropertyFlooring\CreatePropertyFlooringRequest;
use App\Http\Requests\PropertyFlooring\UpdatePropertyFlooringRequest;
use App\Http\Traits\FlooringTrait;
use App\Http\Traits\PropertyFlooringTrait;
use App\Http\Traits\PropertyTrait;
use App\Models\Flooring;
use App\Models\Property;
use App\Models\PropertyFlooring;
use Illuminate\Http\RedirectResponse;

class PropertyFlooringController extends Controller
{
    private $propertyFlooringModel;
    private $propertyModel;
    private $flooringModel;
    use PropertyFlooringTrait, PropertyTrait, FlooringTrait;
    public function __construct(Property $property, Flooring $flooring, PropertyFlooring $propertyFlooring)
    {
        $this->propertyModel = $property;
        $this->flooringModel = $flooring;
        $this->propertyFlooringModel = $propertyFlooring;
    }

    public function index()
    {
        $property_flooring = $this->propertyFlooringModel::with(['property', 'flooring'])->get();
        return view('pages.property_flooring.index', compact('property_flooring'));
    }

    public function create()
    {
        $properties = $this->propertyModel::get();
        $flooring = $this->flooringModel::get();
        return view('pages.property_flooring.create', compact('properties', 'flooring'));
    }

    public function store(CreatePropertyFlooringRequest $request)
    {
        $this->propertyFlooringModel::create([
            'property_id' => $request->property_id,
            'flooring_id' => $request->flooring_id
        ]);
        return redirect(route('admin.property-flooring.index'));
    }

    public function delete(CheckPropertyFlooringIdRequest $request): RedirectResponse
    {
        $this->propertyFlooringModel::find($request->id)->delete();
        return back();
    }

    public function edit(CheckPropertyFlooringIdRequest $request)
    {
        $properties = $this->propertyModel::get();
        $flooring = $this->flooringModel::get();
        $property_flooring = $this->propertyFlooringModel::find($request->id);
        return view('pages.property_flooring.edit', compact('property_flooring', 'properties', 'flooring'));
    }

    public function update(UpdatePropertyFlooringRequest $request)
    {
        $this->propertyFlooringModel::find($request->id)->update([
            'property_id' => $request->property_id,
            'flooring_id' => $request->flooring_id
        ]);
        return redirect(route('admin.property-flooring.index'));
    }
}
