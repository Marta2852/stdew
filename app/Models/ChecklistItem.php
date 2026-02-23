<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{

    protected $fillable = ['title', 'category_id', 'is_completed'];

    public function category()
{
    return $this->belongsTo(Category::class);
}
}
