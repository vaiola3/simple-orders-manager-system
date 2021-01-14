<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyClientAddressesRequest extends FormRequest
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
            'address_id' => 'exists:addresses,id'
        ];
    }

    public function all ($keys = null)
    {
        $data = parent::all($keys);

        $data['address_id'] = $this->route('address_id');

        return $data;
    }
}
