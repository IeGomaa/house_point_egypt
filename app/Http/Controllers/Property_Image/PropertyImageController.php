<?php

namespace App\Http\Controllers\Property_Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyImage\CheckPropertyImageIdRequest;
use App\Http\Requests\PropertyImage\CreatePropertyImageRequest;
use App\Http\Requests\PropertyImage\UpdatePropertyImageRequest;
use App\Http\Services\PropertyImage\PropertyImageDeleteImageService;
use App\Http\Services\PropertyImage\PropertyImageUploadImageService;
use App\Http\Traits\PropertyImageTrait;
use App\Http\Traits\PropertyTrait;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyImageController extends Controller
{
    private $propertyImageModel;
    private $propertyModel;
    use PropertyImageTrait, PropertyTrait;
    public function __construct(Property $property, PropertyImage $propertyImage)
    {
        $this->propertyModel = $property;
        $this->propertyImageModel = $propertyImage;
    }

    public function index()
    {
        $property_images = $this->propertyImageModel::with(['property'])->get();
        return view('pages.property_image.index', compact('property_images'));
    }

    public function create()
    {
        $properties = $this->getProperties();
        return view('pages.property_image.create', compact('properties'));
    }

    public function store(CreatePropertyImageRequest $request, PropertyImageUploadImageService $service)
    {
        for ($i = 0 ,$count = count($request->image); $i < $count; $i++) {
            $imageName = $service->uploadImage($request->image[$i], $i);
            $this->propertyImageModel::create([
                'property_id' => $request->property_id,
                'image' => $imageName
            ]);
        }
        Alert::toast('Property Image Was Created Successfully' , 'success');
        return redirect(route('admin.property-image.index'));
    }

    public function delete(CheckPropertyImageIdRequest $request, PropertyImageDeleteImageService $service): RedirectResponse
    {
        $propertyImage = $this->findPropertyImageById($request->id);
        $service->deleteImageInLocal($propertyImage->image);
        $propertyImage->delete();
        Alert::toast('Property Image Was Deleted Successfully' , 'success');
        return back();
    }

    public function edit(CheckPropertyImageIdRequest $request)
    {
        $properties = $this->getProperties();
        $property_image = $this->findPropertyImageById($request->id);
        return view('pages.property_image.edit', compact('property_image', 'properties'));
    }

    public function update(UpdatePropertyImageRequest $request, PropertyImageUploadImageService $service)
    {
        $propertyImage = $this->findPropertyImageById($request->id);
        $imageName = $service->uploadImage($request->image,0 , $propertyImage->image);
        $propertyImage->update([
            'property_id' => $request->property_id,
            'image' => $imageName
        ]);
        Alert::toast('Property Image Was Updated Successfully' , 'success');
        return redirect(route('admin.property-image.index'));
    }
}
