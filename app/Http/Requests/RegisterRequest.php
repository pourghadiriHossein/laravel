<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'phone' => 'required|digits_between:11,14',
            'email' => 'required|email',
            'password' => ['required', 'max:100',
            Password::min(4)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
        ];
    }
}
