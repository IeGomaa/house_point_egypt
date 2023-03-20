<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flooring extends Model
{
    use HasFactory;
    protected $fillable = [
        'floor'
    ];

    public static function createRule(): array
    {
        return [
            'floor' => 'required|string|max:255|unique:floorings,floor'
        ];
    }
}
