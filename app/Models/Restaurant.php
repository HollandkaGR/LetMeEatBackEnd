<?php

namespace App\Models;

use App\Models\Category;
use App\User;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $fillable = [
        'name', 'city', 'open_hours', 'isActive', 'description', 'showMessage'
    ];

    protected $hidden = [
        'owner_id', 'created_at'
    ];

    protected $casts = [
        'open_hours' => 'array',
        'isActive' => 'boolean',
        'showMessage' => 'boolean'
    ];

    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['categories'];

    public function getCityAttribute($value)
    {
        return City::findOrFail($value);
    }

    public function owner()
    {
    	return $this->belongsTo(User::class);
    }

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }
}
