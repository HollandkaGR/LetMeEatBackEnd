<?php

namespace App\Models;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	protected $fillable= [
		'name', 'description', 'price', 'inAction', 'salePercent'
	];

	protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $casts = [
        'inAction' => 'boolean'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }
}
