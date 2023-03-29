<?php

namespace App\Http\Controllers\Property_Summary;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertySummary\CheckPropertySummaryIdRequest;
use App\Http\Requests\PropertySummary\CreatePropertySummaryRequest;
use App\Http\Requests\PropertySummary\UpdatePropertySummaryRequest;
use App\Http\Traits\PropertySummaryTrait;
use App\Http\Traits\PropertyTrait;
use App\Http\Traits\SummaryTrait;
use App\Models\Property;
use App\Models\PropertySummary;
use App\Models\Summary;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class PropertySummaryController extends Controller
{
    private $propertySummaryModel;
    private $propertyModel;
    private $summaryModel;
    use PropertySummaryTrait, PropertyTrait, SummaryTrait;
    public function __construct(Property $property, Summary $summary, PropertySummary $propertySummary)
    {
        $this->propertyModel = $property;
        $this->summaryModel = $summary;
        $this->propertySummaryModel = $propertySummary;
    }

    public function index()
    {
        $property_summaries = $this->getPropertySummaries();
        return view('pages.property_summary.index', compact('property_summaries'));
    }

    public function create()
    {
        $properties = $this->getProperties();
        $summaries = $this->getSummaries();
        return view('pages.property_summary.create', compact('properties', 'summaries'));
    }

    public function store(CreatePropertySummaryRequest $request)
    {
        $this->propertySummaryModel::create([
            'property_id' => $request->property_id,
            'summary_id' => $request->summary_id
        ]);
        Alert::toast('Property Summary Was Created Successfully' , 'success');
        return redirect(route('admin.property-summary.index'));
    }

    public function delete(CheckPropertySummaryIdRequest $request): RedirectResponse
    {
        $this->findPropertySummaryById($request->id)->delete();
        Alert::toast('Property Summary Was Deleted Successfully' , 'success');
        return back();
    }

    public function edit(CheckPropertySummaryIdRequest $request)
    {
        $properties = $this->getProperties();
        $summaries = $this->getSummaries();
        $property_summary = $this->findPropertySummaryById($request->id);
        return view('pages.property_summary.edit', compact('property_summary', 'properties', 'summaries'));
    }

    public function update(UpdatePropertySummaryRequest $request)
    {
        $this->findPropertySummaryById($request->id)->update([
            'property_id' => $request->property_id,
            'summary_id' => $request->summary_id
        ]);
        Alert::toast('Property Summary Was Update Successfully' , 'success');
        return redirect(route('admin.property-summary.index'));
    }
}
