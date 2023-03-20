<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlooringNum extends Model
{
    use HasFactory;
    protected $fillable = [
        'floor_num'
    ];

    public static function createRule(): array
    {
        return [
            'floor_num' => 'required|string|max:255'
        ];
    }
}
