<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'name'
	];

	protected $hidden = [
		'created_at', 'updated_at'
	];

	public function restaurants()
	{
		return $this->belongsToMany(Restaurant::class);
	}
}
