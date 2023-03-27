<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'iso',
        'name',
        'country_code',
        'phone_code'
    ];

    public static function createRule(): array
    {
        return [
            'name' => 'required|string|max:255',
            'iso' => 'required|string|max:255',
            'country_code' => 'required|integer',
            'phone_code' => 'required|integer'
        ];
    }
}
