<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingStoreRequest extends FormRequest
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
            'destination' => 'required|string',
            'delivery_type' => 'required|string',
            'delivery_time' => 'required|string',
            'cost' => 'required|string',
            'status' => 'required|integer'
        ];
    }
}
