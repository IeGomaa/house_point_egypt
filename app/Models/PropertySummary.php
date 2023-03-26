<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertySummary extends Model
{
    use HasFactory;
    protected $fillable = [
        'summary_id',
        'property_id'
    ];

    public static function createRule(): array
    {
        return [
            'property_id' => 'required|integer|exists:properties,id',
            'summary_id' => 'required|integer|exists:summaries,id',
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

    public function summary(): BelongsTo
    {
        return $this->belongsTo(Summary::class, 'summary_id', 'id');
    }
}
