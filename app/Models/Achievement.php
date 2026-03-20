<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_path',      
        'is_unlocked',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
{
    return asset('achievements/' . $this->image_path);
}
}