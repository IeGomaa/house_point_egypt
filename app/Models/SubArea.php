<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubArea extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'area_id'
    ];

    public static function createRule(): array
    {
        return [
            'name' => 'required|string|max:255',
            'area_id' => 'required|integer|exists:areas,id'
        ];
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
