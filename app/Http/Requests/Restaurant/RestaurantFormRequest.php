<?php

namespace App\Http\Requests\Restaurant;

use App\Http\Requests\FormRequest;
use Illuminate\Http\Request;

class RestaurantFormRequest extends FormRequest
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
          'name'    => 'required|min:2|max:255|unique:restaurants,name,'. $request->id . ',id,city,' . $request->city['id'],
          'city.id' => 'required|exists:cities,id',
      ];
    }

    public function messages()
    {
        return [
          'name.required' => 'A név megadása kötelező!',
          'name.min' => 'A névnek minimum 2 karakter hosszúnak kell lennie!',
          'name.unique' => 'Van már ilyen nevű étterem a városban',
          'city.id.required' => 'Az étterem helyének megadása kötelező',
          'city.id.exists' => 'Nincs ilyen település!?',
        ];
    }
}
