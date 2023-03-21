<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Furniture extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'furniture'
    ];

    public $translatable = ['furniture'];

    public static function createRule(): array
    {
        return [
            'furniture_en' => 'required|string|max:255',
            'furniture_ar' => 'required|string|max:255'
        ];
    }
}
