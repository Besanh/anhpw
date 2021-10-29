<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'cate_id' => 'required|integer',
            'bid' => 'required|integer',
            'name' => 'required|string',
            'name_seo' => 'required|string',
            'designer' => 'string|nullable',
            'public_year' => 'date_format:Y|nullable',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
            'image_thumb_small' => 'string|nullable',
            'thumb' => 'string|nullable',
            'thumb_small' => 'string|nullable',
            'description' => 'string|nullable',
            'benefit' => 'string|nullable',
            'ingredient' => 'string|nullable',
            'incense_group' => 'string|nullable',
            'styles' => 'string|nullable',
            'promote' => 'required|integer',
            'status' => 'required|integer'
        ];
    }
}
