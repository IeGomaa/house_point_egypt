<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class SubArea extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'name',
        'area_id'
    ];

    public $translatable = ['name'];

    public static function createRule(): array
    {
        return [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'area_id' => 'required|integer|exists:areas,id'
        ];
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
