<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\RestaurantFormRequest;
use App\Models\City;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

	public function index(Request $request)
	{
		$owner_id = $request->user()->id;
		return Restaurant::where('owner_id', $owner_id)->orderBy('name')->get();
	}

	public function create(RestaurantFormRequest $request)
	{
		$restaurant = new Restaurant;
		
		$restaurant->owner_id 		= $request->user()->id;
		$restaurant->name 			= $request->name;
		$restaurant->city			= $request->city['id'];
		$restaurant->open_hours		= $request->open_hours;

		if ($restaurant->save()) {
			return response()->json(
				[
				'data' => $restaurant
				], 200);
		}
		else {
			return response()->json(
				[
				'error' => 'Hiba a mentés során'
				], 500);	
		}
	}

	public function update(RestaurantFormRequest $request)
	{
		$restaurant = Restaurant::findOrFail($request->id);
		
		$restaurant->owner_id 		= $request->user()->id;
		$restaurant->name 			= $request->name;
		$restaurant->city			= $request->city['id'];
		$restaurant->open_hours		= $request->open_hours;
		$restaurant->isActive			= $request->isActive;
		$restaurant->showMessage		= $request->showMessage;
		$restaurant->description		= $request->description;

		if ($restaurant->save()) {
			return response()->json(
				[
				'data' => $restaurant
				], 200);
		}
		else {
			return response()->json(
				[
				'error' => 'Hiba a mentés során'
				], 500);	
		}
	}

	public function delete(Request $request)
	{
		$restaurant = Restaurant::findOrFail($request->id);

		if ($restaurant->forceDelete()) {
			return response(200);
		}
		else {
			return response()->json(
				[
				'error' => 'Hiba a mentés során'
				], 500);	
		}
	}

	public function possibleCities ()
	{
		return City::all();
	}
}
