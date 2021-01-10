<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'client_id' => 'required',
            'delivery_type_id' => 'required',
            'dish_id' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'client_id.required' => 'É necessário informar um cliente.',
            'delivery_type_id.required' => 'É necessário informar um tipo de entrega.',
            'dish_id.required' => 'É necessário informar os pratos da encomenda.',
        ];
    }
}
