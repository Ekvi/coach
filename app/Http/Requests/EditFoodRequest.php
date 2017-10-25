<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFoodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Поле "Описание" не может быть пустым',
        ];
    }
}