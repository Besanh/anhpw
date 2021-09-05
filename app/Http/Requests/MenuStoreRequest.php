<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
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
            'parent_id' => ['required', 'integer'],
            'type_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:100'],
            'name_seo' => ['required', 'string', 'max:100'],
            'alias' => ['required', 'string', 'max:100'],
            'url' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'integer'],
            'status' => ['required', 'integer']
        ];
    }
}
