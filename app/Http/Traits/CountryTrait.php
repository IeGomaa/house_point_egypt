<?php

namespace App\Http\Traits;

trait CountryTrait
{
    private function getCountries()
    {
        return $this->countryModel::get();
    }

    private function findCountryById($id)
    {
        return $this->countryModel::find($id);
    }
}
