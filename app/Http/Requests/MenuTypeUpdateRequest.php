<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuTypeUpdateRequest extends FormRequest
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
        // Dung 1 trong 2 cacch
        // $id = $this->menu_type->id;
        // $id = $this->route('menu_type')->id;
        return [
            'name' => 'required|string',
            // 'alias' => 'required|string|unique:menu_types,alias,' . $id . ',id',
            'status' => 'required|integer'
        ];
    }
}
