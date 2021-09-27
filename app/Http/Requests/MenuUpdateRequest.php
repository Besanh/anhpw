<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuUpdateRequest extends FormRequest
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
            'route' => ['string', 'max:100', 'nullable'],
            'url' => ['required', 'string', 'max:255'],
            'icon' => ['string', 'max:50', 'nullable'],
            'note' => ['string', 'max:50', 'nullable'],
            'priority' => ['required', 'integer'],
            'status' => ['required', 'integer']
        ];
    }
}
