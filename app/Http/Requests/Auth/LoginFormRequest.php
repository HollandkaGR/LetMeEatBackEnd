<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Az email cím megadása kötelező!',
            'email.email' => 'Az email cím nem érvényes!',
            'email.exists' => 'Nincs ilyen felhasználó regisztrálva!',
            'password.required' => 'A jelszó megadása kötelező!'
        ];
    }
}
