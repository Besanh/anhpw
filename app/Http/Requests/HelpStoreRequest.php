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
            'help_type_id' => 'required|integer',
            'title' => 'required|string',
            'sub_title' => 'string|nullable',
            'priority' => 'required|integer',
            'status' => 'required|integer'
        ];
    }
}
