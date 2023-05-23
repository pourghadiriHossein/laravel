<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDiscountRequest extends FormRequest
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
        if($this->input('price') and $this->input('percent') and $this->input('gift_code')){
            return [
                'label' => 'required|min:3|max:100',
                'price' => 'numeric',
                'percent' => 'digits_between:0,100',
                'gift_code' => 'max:100',
                'status' => 'digits_between:0,1',
            ];
        }
        else {
            return [
                'label' => 'required|min:3|max:100',
                'percent' => 'digits_between:0,100',
                'gift_code' => 'max:100',
                'status' => 'digits_between:0,1',
            ];
        }

    }
}
