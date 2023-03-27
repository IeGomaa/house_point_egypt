<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;
use App\Models\Property;

class OwnerController extends Controller
{
    private $propertyModel;
    public function __construct(Property $property)
    {
        $this->propertyModel = $property;
    }

    public function index()
    {
        return view('pages.owner.index');
    }

    public function search(SearchRequest $request)
    {
        $owner = $this->propertyModel::select(['owner_name', 'owner_phone', 'owner_address'])->where('id', $request->property_id)->first();
        return view('pages.owner.search', compact('owner'));
    }
}
