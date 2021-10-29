<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RsUpdateRequest extends FormRequest
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
            'type' => ['required', 'string', Rule::in(['SLIDE_NO_TYPE', 'SLIDE_WRITTER', 'SLIDE_BTN_WRITTER'])],
            'image' => 'string|nullable',
            'title' => 'string|nullable',
            'type_writter' => 'string|nullable',
            'btn_name' => 'string|nullable',
            'link' => 'string|nullable',
            'priority' => 'integer',
            'status' => 'integer'
        ];
    }
}
