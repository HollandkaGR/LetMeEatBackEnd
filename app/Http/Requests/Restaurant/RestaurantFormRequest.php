<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'name'          => 'required|min:2|max:255',
            'city.id'          => 'required|exists:cities,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A név megadása kötelező!',
            'name.min' => 'A névnek minimum 2 karakter hosszúnak kell lennie!',
            'city.required' => 'Az étterem helyének megadása kötelező',
        ];
    }
}
