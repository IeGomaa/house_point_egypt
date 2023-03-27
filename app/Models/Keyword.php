<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Keyword extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'title',
        'description',
        'keyword',
        'tag'
    ];

    public $translatable = [
        'title',
        'description',
        'keyword',
        'tag'
    ];

    public static function createRule(): array
    {
        return [
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'keyword_en' => 'required|string',
            'keyword_ar' => 'required|string',
            'tag_en' => 'required|string',
            'tag_ar' => 'required|string'
        ];
    }
}
