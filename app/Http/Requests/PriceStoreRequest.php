<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceStoreRequest extends FormRequest
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
            'cate_id' => 'required|integer',
            'pid' => 'required|integer',
            'sap_id' => "required|string|max:50|unique:prices",
            'barcode' => "required|string|max:50|unique:prices",
            'name' => 'required|string',
            'name_seo' => 'required|string',
            'sex' => 'required|integer',
            'promote' => 'required|integer',
            'capa' => 'required|string|max:50',
            'capa_id' => 'required|integer',
            'price' => 'required|integer',
            'note' => 'string|nullable',
            'status' => 'required|integer',
            'stock' => 'required|integer',
        ];
    }
}
