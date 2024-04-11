<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CreatePostRequest extends FormRequest
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
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'image' => [
                'required',
                File::image()
                    ->min(1)
                    ->max('1mb')
                    ->dimensions(Rule::dimensions()->maxWidth(2500)->maxHeight(2500))
            ]
        ];
    }
}
