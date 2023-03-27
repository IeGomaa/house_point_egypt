<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PropertyImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Property([
            'property' => $row['property'],
            'price' => $row['price'],
            'tag' => [
                'en' => $row['tag_en'],
                'ar' => $row['tag_ar']
            ],
            'surface_area' => $row['surface_area'],
            'title' => [
                'en' => $row['title_en'],
                'ar' => $row['title_ar']
            ],
            'status' => $row['status'],
            'number_of_rooms' => $row['number_of_rooms'],
            'number_of_bathrooms' => $row['number_of_bathrooms'],
            'description' => $row['description'],
            'date' => $row['date'],
            'type' => $row['type'],
            'owner_name' => $row['owner_name'],
            'owner_phone' => $row['owner_phone'],
            'owner_address' => $row['owner_address'],
            'video' => $row['video'],
            'rate' => $row['rate'],
            'rate_number' => $row['rate_number'],
            'views' => $row['views'],
            'user_id' => $row['user_id'],
            'area_id' => $row['area_id'],
            'sub_area_id' => $row['sub_area_id'],
            'property_type_id' => $row['property_type_id'],
            'floor_id' => $row['floor_id'],
            'furniture_id' => $row['furniture_id']
        ]);
    }

    public function rules(): array
    {
        return Property::createRule();
    }
}
