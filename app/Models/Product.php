<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
		use SoftDeletes;

		protected $fillable= [
			'name', 'description', 'price'
		];

		protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }
}