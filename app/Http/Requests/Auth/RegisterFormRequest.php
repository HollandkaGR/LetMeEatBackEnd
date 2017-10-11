<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|max:10|confirmed',
            'password_confirmation' => 'required|min:6|max:10',
            'phone_number' => ['required', 'regex:/^\+36(((30|20|70)[0-9]{7})|([2-9]{2})([0-9]{6})|(1)([0-9]{7}))$/']
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'A név megadása kötelező!',
            'first_name.min' => 'A keresztnévnek minimum 2 karakternek kell lennie!',
            'last_name.required' => 'A név megadása kötelező!',
            'last_name.min' => 'A keresztnévnek minimum 2 karakternek kell lennie!',
            'email.required' => 'Az email cím megadása kötelező',
            'email.unique' => 'A megadott email cím már regisztrálva van!',
            'phone_number.regex' => 'Hibás a telefonszám formátuma!',
            'password.required' => 'A jelszó megadása kötelező',
            'password.min' => 'A jelszó hossza 6-10 karakter között lehet!',
            'password.max' => 'A jelszó hossza 6-10 karakter között lehet!',
            'password.confirmed' => 'A megismételt jelszó nem egyezik az eredetivel!'
        ];
    }
}
