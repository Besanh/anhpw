<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpContentStoreRequest extends FormRequest
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
            'help_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
            'priority' => 'required|integer',
            'status' => 'required|integer'
        ];
    }
}
