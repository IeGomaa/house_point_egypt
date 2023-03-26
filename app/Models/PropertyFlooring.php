<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyFlooring extends Model
{
    use HasFactory;
    protected $fillable = [
        'flooring_id',
        'property_id'
    ];

    protected $table = 'property_flooring';

    public static function createRule(): array
    {
        return [
            'property_id' => 'required|integer|exists:properties,id',
            'flooring_id' => 'required|integer|exists:flooring,id',
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

    public function flooring(): BelongsTo
    {
        return $this->belongsTo(Flooring::class, 'flooring_id', 'id');
    }
}
