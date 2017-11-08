<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class RestaurantController extends Controller
{

	public function index(Request $request)
	{
		$restaurants = Restaurant::with('categories')->get();

		return response()->json(
			[
				'data' => $restaurants,
				'timestamp' => \Carbon\Carbon::now()->timestamp
			], 200);
	}

	public function test(Request $request)
	{
		
	}

	public function products(Request $request)
	{
		$categories = Restaurant::with('categories')->where('slug', $request->slug)->first();
		return response()->json(
			[
			'data' => $categories
			], 200);
	}

}
