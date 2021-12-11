<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpTypeUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'alias' => 'required|string',
            'priority' => 'required|integer',
            'status' => 'required|integer'
        ];
    }
}
