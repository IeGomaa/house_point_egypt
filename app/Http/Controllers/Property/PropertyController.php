<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\Property\CheckPropertyIdRequest;
use App\Http\Requests\Property\CreatePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;
use App\Http\Traits\AreaTrait;
use App\Http\Traits\FloorTrait;
use App\Http\Traits\FurnitureTrait;
use App\Http\Traits\GeneralTrait;
use App\Http\Traits\PropertyTrait;
use App\Http\Traits\PropertyTypeTrait;
use App\Http\Traits\SubAreaTrait;
use App\Http\Traits\SummaryTrait;
use App\Models\Area;
use App\Models\Floor;
use App\Models\Furniture;
use App\Models\General;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\SubArea;
use App\Models\Summary;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyController extends Controller
{
    private $propertyModel;
    private $propertyTypeModel;
    private $areaModel;
    private $subAreaModel;
    private $floorModel;
    private $furnitureModel;
    private $summaryModel;
    private $generalModel;
    use PropertyTrait, AreaTrait, SubAreaTrait, PropertyTypeTrait, FloorTrait, FurnitureTrait, SummaryTrait, GeneralTrait;
    public function __construct(Property $property, Area $area, SubArea $subArea, PropertyType $propertyType, Floor $floor, Furniture $furniture, Summary $summary, General $general)
    {
        $this->propertyModel = $property;
        $this->propertyTypeModel = $propertyType;
        $this->areaModel = $area;
        $this->subAreaModel = $subArea;
        $this->floorModel = $floor;
        $this->furnitureModel = $furniture;
        $this->summaryModel = $summary;
        $this->generalModel = $general;
    }

    public function index()
    {
        $properties = $this->getProperties();
        return view('pages.property.index', compact('properties'));
    }

    public function create()
    {
        $areas = $this->getAreas();
        $sub_areas = $this->getSubAreas();
        $property_types = $this->getPropertyTypes();
        $floors = $this->getFloors();
        $furniture = $this->getFurniture();
        $summaries = $this->getSummaries();
        $generals = $this->getGenerals();
        return view('pages.property.create', compact('areas', 'sub_areas', 'property_types', 'floors', 'furniture', 'summaries', 'generals'));
    }

    public function store(CreatePropertyRequest $request)
    {
        $this->propertyModel::create([
            'property' => $request->property,
            'price' => $request->price,
            'surface_area' => $request->surface_area,
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'status' => $request->status,
            'number_of_rooms' => $request->number_of_rooms,
            'number_of_bathrooms' => $request->number_of_bathrooms,
            'description' => $request->description,
            'date' => $request->date,
            'type' => $request->type,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_address' => $request->owner_address,
            'video' => $request->video ?? '',
            'rate' => $request->rate,
            'rate_number' => $request->rate_number,
            'views' => $request->views,
            'user_id' => auth()->user()->id,
            'area_id' => $request->area_id,
            'sub_area_id' => $request->sub_area_id,
            'property_type_id' => $request->property_type_id,
            'floor_id' => $request->floor_id,
            'furniture_id' => $request->furniture_id
        ]);
        Alert::toast('Property Was Created Successfully', 'success');
        return redirect(route('admin.property.index'));
    }

    public function delete(CheckPropertyIdRequest $request): RedirectResponse
    {
        $this->findPropertyById($request->id)->delete();
        Alert::toast('Property Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckPropertyIdRequest $request)
    {
        $property = $this->findPropertyById($request->id);
        $areas = $this->getAreas();
        $sub_areas = $this->getSubAreas();
        $property_types = $this->getPropertyTypes();
        $floors = $this->getFloors();
        $furniture = $this->getFurniture();
        $summaries = $this->getSummaries();
        $generals = $this->getGenerals();
        return view('pages.property.edit', compact('property', 'areas', 'sub_areas', 'property_types', 'floors', 'furniture', 'summaries', 'generals'));
    }

    public function update(UpdatePropertyRequest $request)
    {
        $property = $this->findPropertyById($request->id);
        $property->update([
            'property' => $request->property,
            'price' => $request->price,
            'surface_area' => $request->surface_area,
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'status' => $request->status,
            'number_of_rooms' => $request->number_of_rooms,
            'number_of_bathrooms' => $request->number_of_bathrooms,
            'description' => $request->description,
            'date' => $request->date,
            'type' => $request->type,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_address' => $request->owner_address,
            'video' => $request->video ?? $property->video,
            'rate' => $request->rate,
            'rate_number' => $request->rate_number,
            'views' => $request->views,
            'user_id' => auth()->user()->id,
            'area_id' => $request->area_id,
            'sub_area_id' => $request->sub_area_id,
            'property_type_id' => $request->property_type_id,
            'floor_id' => $request->floor_id,
            'furniture_id' => $request->furniture_id
        ]);
        Alert::toast('Property Was Updated Successfully', 'success');
        return redirect(route('admin.property.index'));
    }
}
