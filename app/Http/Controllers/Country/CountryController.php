<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CheckCountryIdRequest;
use App\Http\Requests\Country\CreateCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Http\Traits\CountryTrait;
use App\Models\Country;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{
    use CountryTrait;
    private $countryModel;
    public function __construct(Country $country)
    {
        $this->countryModel = $country;
    }

    public function index()
    {
        $countries = $this->getCountries();
        return view('pages.country.index', compact('countries'));
    }

    public function create()
    {
        return view('pages.country.create');
    }

    public function store(CreateCountryRequest $request)
    {
        $this->countryModel::create([
            'name' => $request->name,
            'iso' => strtoupper($request->iso),
            'country_code' => $request->country_code,
            'phone_code' => $request->phone_code
        ]);
        Alert::toast('Country Was Created Successfully', 'success');
        return redirect(route('admin.country.index'));
    }

    public function delete(CheckCountryIdRequest $request)
    {
        $this->findCountryById($request->id)->delete();
        Alert::toast('Country Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckCountryIdRequest $request)
    {
        $country = $this->findCountryById($request->id);
        return view('pages.country.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request)
    {
        $this->findCountryById($request->id)->update([
            'name' => $request->name,
            'iso' => strtoupper($request->iso),
            'country_code' => $request->country_code,
            'phone_code' => $request->phone_code
        ]);
        Alert::toast('Country Was Updated Successfully', 'success');
        return redirect(route('admin.country.index'));
    }
}
