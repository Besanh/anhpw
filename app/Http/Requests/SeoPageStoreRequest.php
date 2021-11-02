<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoPageStoreRequest extends FormRequest
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
            'title' => 'string|nullable',
            'pid' => 'integer|nullable',
            'page_name' => 'string|nullable',
            'seo_desc' => 'string|nullable',
            'seo_keyword' => 'string|nullable'
        ];
    }
}
