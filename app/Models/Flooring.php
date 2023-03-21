<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Flooring extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'floor'
    ];

    public $translatable = ['floor'];

    protected $table = 'flooring';

    public static function createRule(): array
    {
        return [
            'floor_en' => 'required|string|max:255',
            'floor_ar' => 'required|string|max:255'
        ];
    }
}
