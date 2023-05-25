<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AddUserRequest extends FormRequest
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
            'status' => 'required|digits_between:0,1',
            'role' =>'required|digits_between:1,2'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام و نام خانوادگی خود را وارد کنید',
            'name.min' => 'نام و نام خانوادگی حداقل باید 3 حرف باشد',
            'name.max' => 'نام و نام خانوادگی حداکثر می تواند 100 حرف باشد',
            'phone.required' => 'شماره تماس خود را وارد کنید',
            'phone.digits_between' => 'شماره تماس شما نمی تواند غیر عدد بوده و کمتر از 11 رقم و بیشتر از 14 رقم باشد',
            'email.required' => 'پست الکترونیک خود را وارد کنید',
            'email.email' => 'یک پست الکترونیک معتبر وارد کنید',
            'password.required' => 'رمز عبور خود را وارد کنید',
            'password.min' => 'رمز عبور شما نمی تواند کمتر از 4 کاراکتر باشد',
            'password.max' => 'رمز عبور شما نمی تواند بیشتر از 100 کاراکتر باشد',
            'status.required' => 'وضعیت باید وارد شود',
            'status.digits_between' => 'وضعیت نمی تواند خارج از محدوده مجاز باشد',
            'role.required' => 'نقش باید وارد شود',
            'role.digits_between' => 'نقش نمی تواند خارج از محدوده مجاز باشد',
        ];
    }
}
