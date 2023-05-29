<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        if ($this->file('images')){
            return [
                'label' => 'required|min:3|max:100',
                'price' => 'numeric',
                'count' => 'digits_between:0,500',
                'description' => 'required|min:3|max:10000',
                'status' => 'digits_between:0,1',
                'category_id' => 'numeric',
                'tags' => 'required|array',
                'tags.*' => 'numeric',
                'images' => 'required|array',
                'images.*' => 'image',
            ];
        }else{
            return [
                'label' => 'required|min:3|max:100',
                'price' => 'numeric',
                'count' => 'digits_between:0,500',
                'description' => 'required|min:3|max:10000',
                'status' => 'digits_between:0,1',
                'category_id' => 'numeric',
                'tags' => 'required|array',
                'tags.*' => 'numeric',
            ];
        }
    }
}
