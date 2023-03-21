<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PropertyType extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'type'
    ];

    public $translatable = ['type'];

    public static function createRule(): array
    {
        return [
            'type_en' => 'required|string|max:255',
            'type_ar' => 'required|string|max:255'
        ];
    }
}
