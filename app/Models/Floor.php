<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $fillable = [
        'number'
    ];

    public static function createRule(): array
    {
        return [
            'number' => 'required|string|max:255'
        ];
    }
}
