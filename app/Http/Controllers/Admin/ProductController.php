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
		$restaurant = Category::findOrFail($request->catId)->restaurant;
		if (!$restaurant->hasRight($request->user())) {
			return response()->json(
				[
					'error' => 'Nincs joga!'
				], 423);
		}

		$product = new Product;
		
		$product->name 					= $request->name;
		$product->description		= $request->description;
		$product->price					= $request->price;
		$product->category_id		= $request->catId;
		$product->inAction			= $request->inAction;
		$product->salePercent		= $request->salePercent;

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
		
		$restaurant = Category::findOrFail($request->catId)->restaurant;
		if (!$restaurant->hasRight($request->user())) {
			return response()->json(
				[
					'error' => 'Nincs joga!'
				], 423);
		}

		$product = Product::findOrFail($request->id);
		try{
			$product->name = $request->name;
			$product->description = $request->description;
			$product->price = $request->price;
			$product->inAction = $request->inAction;
			$product->salePercent = $request->salePercent;

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

	public function delete(Request $request, $id)
	{

		$product = Product::findOrFail($id);

		if (!$product->category->restaurant->hasRight($request->user())) {
			return response()->json(
				[
					'error' => 'Nincs joga!'
				], 423);
		}

		try{
			if ($product->forceDelete())
			{
				return response()->json(null, 200);
			}
			else 
			{
				return response()->json(
					[
					'error' => 'Hiba a szerveren, a törlés során'
					], 500);
			}
		} catch(QueryException $e){
			dd('hiba: ' . $e->getMessage());
			echo $e->getMessage();   // insert query
		}
		
	}
}
