<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Restaurant;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes, CascadeSoftDeletes;

	protected $fillable = [
		'name'
	];

	protected $hidden = [
		'created_at', 'updated_at'
	];

	protected $cascadeDeletes = ['products'];
	protected $dates = ['deleted_at'];

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
