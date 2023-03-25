<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFlooring extends Model
{
    use HasFactory;
    protected $fillable = [
        'flooring_id',
        'property_id'
    ];

    protected $table = 'property_flooring';
}
