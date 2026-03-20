<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crops extends Model
{
    protected $fillable = [
        'name', 
        'season', 
        'growth_time',
        'image_path'
    ];
}
