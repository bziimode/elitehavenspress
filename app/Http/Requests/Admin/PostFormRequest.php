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
                'required',
                'string',
                'max:200'
            ],
            'description' => [
                'required'
            ],            
            'article_date' => [
                'required'
            ],            
            'publish_date' => [
                'required'
            ],
            'thumbnail' => [
                'nullable',
                'mimes:jpeg,jpg,png'
            ],
            'filename' => [
                'nullable'
            ],
            'author' => [
                'required'
            ],            
            'meta_title' => [
                'required',
                'string',
                'max:200'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'status' => [
                'nullable'
            ]

        ];

        return  $rules;
    }
}
