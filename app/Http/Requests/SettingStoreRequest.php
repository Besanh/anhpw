<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
            'value_setting' => 'required',
            'type' => 'required|string',
            'status' => 'required|integer'
        ];
    }

    // protected function getValidatorInstance()
    // {
    //     $this->value_setting = $this->proccessValue();
    //     return parent::getValidatorInstance();
    // }

    // protected function proccessValue()
    // {
    //     $json_value = [];
    //     if (is_array($this->value_setting)) {
    //         foreach ($this->value_setting as $k => $node) {
    //             $json_value[$k] = [
    //                 $this->key_setting[$k] => $node
    //             ];
    //         }
    //     }

    //     return json_encode($json_value, JSON_FORCE_OBJECT);
    // }
}
