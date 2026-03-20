<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'species',
        'name',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('animals_img/' . $this->image_path);
    }
}