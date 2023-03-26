<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'image'
    ];

    public static function createRule(): array
    {
        return [
            'property_id' => 'required|integer|exists:properties,id',
            'image' => 'required|array'
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

    public function getImageAttribute($value): string
    {
        return 'uploaded/propertyImage/' . $value;
    }
}
