<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Summary extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'summary'
    ];

    public $translatable = ['summary'];

    public static function createRule(): array
    {
        return [
            'summary_en' => 'required|string|max:255',
            'summary_ar' => 'required|string|max:255'
        ];
    }
}
