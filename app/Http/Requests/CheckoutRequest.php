<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        if($this->input('previousAddress')){
            return [
                'previousAddress' => 'accepted',
                'acceptTerm' => 'accepted',
            ];
        }else{
            return [
                'newAddress' => 'accepted',
                'acceptTerm' => 'accepted',
            ];
        }

    }
    public function messages()
    {
        return [
            'previousAddress.accepted' => 'یکی از حالت های آدرس باید انتخاب شود',
            'newAddress.accepted' => 'یکی از حالت های آدرس باید انتخاب شود',
            'acceptTerm.accepted' => 'قوانین و مقررات سایت پذرفته نشده است',
        ];
    }
}
