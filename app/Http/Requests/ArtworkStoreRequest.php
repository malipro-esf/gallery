<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtworkStoreRequest extends FormRequest
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
            'name_persian' => 'required|unique:artworks,name_persian',
            'name_english' => 'required|unique:artworks,name_english',
            'idea_type' => 'required',
            'paint_type' => 'required',
            'year_created' => 'nullable',
            'subject_persian' => 'nullable',
            'subject_english' => 'nullable',
            'statement_english' => 'nullable',
            'statement_persian' => 'nullable',
            'description_persian' => 'nullable',
            'description_english' => 'nullable',
            'styles' => 'required|Array',
            'techniques' => 'required|Array',
            'tags' => 'required|Array',
            'images' => 'required|Array',
            'price_rials' => 'nullable',
            'price_usd' => 'nullable',
            'attrValues' => 'nullable|array'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
        ];
    }
}
