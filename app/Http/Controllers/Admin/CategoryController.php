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
		// dd(Restaurant::findOrFail($restId)->owner->id);
		// dd($this->userOwnRest($request->user()->id, $restId));
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

	private function userOwnRest($userId, $restId)
	{
		return $userId === Restaurant::findOrFail($restId)->owner->id;
	}

}