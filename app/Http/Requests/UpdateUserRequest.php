<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
        if ($this->input('password')) {
            return [
                'name' => 'min:3|max:100',
                'phone' => 'digits_between:11,14',
                'email' => 'email',
                'password' => ['max:100',
                Password::min(4)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
                'status' => 'digits_between:0,1',
                'role' =>'digits_between:1,2'
            ];
        }
        else {
            return [
                'name' => 'min:3|max:100',
                'phone' => 'digits_between:11,14',
                'email' => 'email',
                'status' => 'digits_between:0,1',
                'role' =>'digits_between:1,2'
            ];
        }
    }
}
