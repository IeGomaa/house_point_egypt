<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;
    protected $fillable = [
        'furniture'
    ];

    public static function createRule(): array
    {
        return [
            'furniture' => 'required|string|max:255'
        ];
    }
}
