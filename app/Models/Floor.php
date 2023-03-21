<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Floor extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'number'
    ];

    public $translatable = ['number'];

    public static function createRule(): array
    {
        return [
            'number_en' => 'required|string|max:255',
            'number_ar' => 'required|string|max:255'
        ];
    }
}
