<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	
	public function create(ProductFormRequest $request)
	{
		// dd(Category::findOrFail($request->catId)->restaurant->id);
		$restId = Category::findOrFail($request->catId)->restaurant->id;
		if (!$this->userOwnRest($request->user()->id, $restId)) {
			return response()->json(
				[
					'error' => 'Nincs jogod ehhez!'
				], 422);
		}

		$product = new Product;
		
		$product->name 					= $request->name;
		$product->description		= $request->description;
		$product->price					= $request->price;
		$product->category_id		= $request->catId;

		if ($product->save()) {
			return response()->json(
				[
					'data' => $product
				], 200);
		}
		else {
			return response()->json(
				[
					'error' => 'Hiba a mentés során'
				], 500);	
		}
	}

	public function update(ProductFormRequest $request)
	{
		$product = Product::findOrFail($request->prodId);
		$restId = Category::findOrFail($request->catId)->restaurant->id;

		if ($this->userOwnRest($request->user()->id, $restId)) {
			try{
				$product->name = $request->name;
				$product->description = $request->description;
				$product->price = $request->price;

				if ($product->save())
				{
					return response()->json(
						[
							'data' => $product
						], 200);
				}
				else 
				{
					return response()->json(
						[
							'error' => 'Hiba a mentés során'
						], 500);
				}
			} catch(QueryException $e) {
				dd('hiba: ' . $e->getMessage());
				echo $e->getMessage();   // insert query
			}
		}
		else 
		{
			return response()->json(
				[
				'error' => 'Nincs joga!'
				], 423);
		}
	}

	private function userOwnRest($userId, $restId)
	{
		if ($owner = Restaurant::findOrFail($restId)->owner) {
			return $userId === $owner->id;
		}
		else
		{
			return false;
		}
	}
}
