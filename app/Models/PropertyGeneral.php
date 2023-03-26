<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyGeneral extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'general_id'
    ];

    public static function createRule(): array
    {
        return [
            'property_id' => 'required|integer|exists:properties,id',
            'general_id' => 'required|integer|exists:generals,id',
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

    public function general(): BelongsTo
    {
        return $this->belongsTo(General::class, 'general_id', 'id');
    }
}
