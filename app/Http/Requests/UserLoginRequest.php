<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'required | email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для ввода',
            'email.required' => 'We need to know your email address!',
        ];
    }
}
