<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Property extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'property',
        'price',
        'tag',
        'surface_area',
        'title',
        'status',
        'number_of_rooms',
        'number_of_bathrooms',
        'description',
        'date',
        'type',
        'owner_name',
        'owner_phone',
        'owner_address',
        'video',
        'rate',
        'rate_number',
        'views',
        'user_id',
        'area_id',
        'sub_area_id',
        'property_type_id',
        'floor_id',
        'furniture_id'
    ];

    public $translatable = ['title', 'tag'];

    public static function createRule(): array
    {
        return [
            'property' => 'required|string|max:255',
            'price' => 'required|numeric',
            'surface_area' => 'required|numeric',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'number_of_rooms' => 'required|integer',
            'number_of_bathrooms' => 'required|integer',
            'description' => 'required|string',
            'date' => 'required|date',
            'type' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|numeric',
            'owner_address' => 'required|string|max:255',
            'video' => 'url',
            'tag_en' => 'string',
            'tag_ar' => 'string',
            'rate' => 'required|numeric',
            'rate_number' => 'required|integer',
            'views' => 'required|numeric',
            'area_id' => 'required|integer|exists:areas,id',
            'sub_area_id' => 'required|integer|exists:sub_areas,id',
            'property_type_id' => 'required|integer|exists:property_types,id',
            'floor_id' => 'required|integer|exists:floors,id',
            'furniture_id' => 'required|integer|exists:furniture,id'
        ];
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function sub_area(): BelongsTo
    {
        return $this->belongsTo(SubArea::class, 'sub_area_id', 'id');
    }

    public function property_type(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class, 'floor_id', 'id');
    }

    public function furniture(): BelongsTo
    {
        return $this->belongsTo(Furniture::class, 'furniture_id', 'id');
    }
}
