<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Пароль не может быть пустым',
            'password.min'  => 'Пароль не должен быть меньше 6 символов',
        ];
    }
}