<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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

        $rules = [
            'title' => [
                'required',
                'string',
                'max:200'
            ],
            'slug' => [
                'nullable',
                'string',
                'max:200'
            ],
            'description' => [
                'nullable'
            ],            
            'article_date' => [
                'nullable'
            ],            
            'publish_date' => [
                'nullable'
            ],
            'thumbnail' => [
                'nullable',
                'mimes:jpeg,jpg,png'
            ],
            'filename' => [
                'nullable'
            ],
            'img_title' => [
                'nullable'
            ],
            'author' => [
                'nullable'
            ],            
            'meta_title' => [
                'nullable',
                'string',
                'max:200'
            ],
            'meta_description' => [
                'nullable',
                'string'
            ],
            'meta_keyword' => [
                'nullable',
                'string'
            ],
            'status' => [
                'nullable'
            ]

        ];

        return  $rules;
    }
}
