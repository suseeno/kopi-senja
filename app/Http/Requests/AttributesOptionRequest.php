<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributesOptionRequest extends FormRequest
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
        $attributeID = (int) $this->get('attributes_id');
        $id = (int) $this->get('id');

        if ($this->method() == 'PUT') {
            $name =
                'required|unique:attributes_options,name,' .
                $id .
                ',id,attributes_id,' .
                $attributeID;
        } else {
            $name =
                'required|unique:attributes_options,name,NULL,id,attributes_id,' .
                $attributeID;
        }

        return [
            'name' => $name,
        ];
    }
}
