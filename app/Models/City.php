<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];

    public function restaurants()
    {
    	return $this->hasMany(Restuarant::class, 'city');
    }
}
