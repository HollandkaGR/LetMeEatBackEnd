<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\CategoryFormRequest;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{

	public function index($restId)
	{
		return Category::where('restaurant_id', $restId)->with('products')->get();
	}

	public function create(CategoryFormRequest $request)
	{
		$restId = $request->restId;

		if ($this->userOwnRest($request->user()->id, $restId)) {
			try{
				$category = new Category();
				$category->restaurant_id = $restId;
				$category->name = $request->name;

				if ($category->save())
				{
					return response()->json(
						[
									'data' => $category
						], 200);
				}
				else 
				{
					return response()->json(
						[
						 'error' => 'Hiba a mentés során'
						], 500);
				}
			} catch(QueryException $e){
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

	public function update(CategoryFormRequest $request)
	{
		$category = Category::find($request->catId);

		if ($this->userOwnRest($request->user()->id, $category->restaurant_id)) {
			try{
				$category->name = $request->name;

				if ($category->save())
				{
					return response()->json(
						[
							'data' => $category
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

	public function delete(Request $request, $catId)
	{
		$category = Category::findOrFail($catId);
		if ($this->userOwnRest($request->user()->id, $category->restaurant_id)) {
			try{
				if ($category->forceDelete())
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
		return $userId === Restaurant::findOrFail($restId)->owner->id;
	}

}