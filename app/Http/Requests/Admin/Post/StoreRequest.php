<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполенения!',
            'title.string' => 'Это поле должно быть строкой!',
            'content.required' => 'Это поле обязательно для заполенения!',
            'content.string' => 'Это поле должно быть строкой!',
            'image.required' => 'Это поле обязательно для заполенения!',
            'image.file' => 'Необходимо добавить файл!',
            'category_id.required' => 'Это поле обязательно для заполенения!',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории должен быть в базе данных',
        ];
    }
}
