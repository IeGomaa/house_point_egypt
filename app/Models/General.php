<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public static function createRule(): array
    {
        return [
            'name' => 'required|string|max:255'
        ];
    }
}
