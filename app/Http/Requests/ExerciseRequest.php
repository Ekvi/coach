<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'video'  => 'mimes:mp4,mov,ogg,qt,3gp | max:70000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" не может быть пустым',
            'title.max'  => 'Поле "Название" не должно превышать 255 символов',
            'description.required' => 'Поле "Описание" не может быть пустым',
            'video.max'  => 'Видео файл не должен превышать 70Мб',
            'video.mimes'  => 'Данный формат видео не поддерживается',
        ];
    }
}
