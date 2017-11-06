<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\RestaurantFormRequest;
use App\Models\City;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

		if (!$restaurant->hasRight($request->user())) {
			return response()->json(
				[
					'error' => 'Nincs joga!'
				], 423);
		}
		
		$restaurant->name 			= $request->name;
		$restaurant->city			= $request->city['id'];
		$restaurant->deliveryTime		= $request->deliveryTime;
		$restaurant->minimumOrder		= $request->minimumOrder;
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

	public function delete(Request $request, $restId)
	{
		$restaurant = Restaurant::findOrFail($restId);

		if (!$restaurant->hasRight($request->user())) {
			return response()->json(
				[
					'error' => 'Nincs joga!'
				], 423);
		}

		if ($restaurant->forceDelete()) {
			if ($restaurant->indexImage !== null) {
				Storage::disk('public')->delete(str_replace('/storage/', '', $restaurant->indexImage));
			}
			return response(200);
		}
		else {
			return response()->json(
				[
				'error' => 'Hiba a mentés során'
				], 500);	
		}
	}

	public function imageUpload(Request $request)
	{
		$this->validate($request, [
			'restIndexImage' 	=> 'image',
			'restId' 					=> 'required|exists:restaurants,id'
		]);

		$restaurant = Restaurant::findOrFail($request->restId);

		if (!$restaurant->hasRight($request->user())) {
			return response()->json(
				[
					'error' => 'Nincs joga!'
				], 423);
		}

		$path = $request->file('restIndexImage')->store('restaurants', 'public');
		$url = Storage::url($path);

		if ($restaurant->indexImage !== null) {
			Storage::disk('public')->delete(str_replace('/storage/', '', $restaurant->indexImage));
		}

		$restaurant->indexImage = $url;

		if ($restaurant->save()) {
			return response(
			[
				'data' => $restaurant
			], 200);
		}
		else {
			return response(
			[
				'error' => 'Hiba a mentés során'
			], 200);
		}
	}

	public function imageDelete(Request $request)
	{
		$restaurant = Restaurant::findOrFail($request->restId);

		if (!$restaurant->hasRight($request->user())) {
			return response()->json(
				[
					'error' => 'Nincs joga!'
				], 423);
		}

		if ($restaurant->indexImage !== null) {
			Storage::disk('public')->delete(str_replace('/storage/', '', $restaurant->indexImage));
		}

		$restaurant->indexImage = null;

		if ($restaurant->save()) {
			return response(
			[
				'data' => $restaurant
			], 200);
		}
		else {
			return response(
			[
				'error' => 'Hiba a mentés során'
			], 200);
		}
	}

	public function possibleCities ()
	{
		return City::all();
	}

}
