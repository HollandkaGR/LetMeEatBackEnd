<?php

namespace App\Models;

use App\Models\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'city', 'open_hours'
    ];

    protected $hidden = [
        'owner_id', 'created_at'
    ];

    protected $casts = [
        'open_hours' => 'array',
    ];

    public function getCityAttribute($value)
    {
        return City::findOrFail($value);
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_id');
    }

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }
}
