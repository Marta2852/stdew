<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    protected $fillable = [
        'name', 
        'season', 
        'day',
        'image_path'
    ];
}
