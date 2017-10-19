<?php

namespace App\Models;

use App\Models\Product;
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

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
