<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'sub_title' => 'required|string|nullable',
            'priority' => 'required|integer',
            'status' => 'required|integer'
        ];
    }
}
