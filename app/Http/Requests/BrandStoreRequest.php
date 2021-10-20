<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
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
            'alias' => 'required|string',
            'name' => 'required|string',
            'name_seo' => 'required|string',
            'description' => 'string|nullable',
            'image' => 'string|nullable',
            'priority' => 'required|integer',
            'status' => 'required|integer'
        ];
    }
}
