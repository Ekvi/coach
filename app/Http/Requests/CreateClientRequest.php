<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'deviceId' => 'required|unique:users',
            'email' => 'email|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'Field :attribute must be unique.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => 'ValidationError',
            'message' => $validator->errors()
        ], 422));
    }
}