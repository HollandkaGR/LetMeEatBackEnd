<?php

namespace App\Http\Requests\Restaurant;

use App\Http\Requests\FormRequest;
use Illuminate\Http\Request;

class CategoryFormRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
			return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(Request $request)
	{
		return [
			'restId'            => 'required|exists:restaurants,id',
			'name'              => 'required|min:2|max:255|unique:categories,name,'. $request->id . ',id,restaurant_id,' . $request->restId
		];
	}

	public function messages()
	{
		return [
			'restId.required'   => 'Nincs étterem azonosító, ez gyanús...',
			'restId.exist'      => 'Nincs ilyen étterem!',
			'name.required' 		=> 'Név megadása kötelező',
			'name.min'          => 'A kategóriának minimum 2 karakter hosszúnak kell lennie!',
			'name.unique'       => 'Van már ilyen kategóriád!',
		];
	}
}
