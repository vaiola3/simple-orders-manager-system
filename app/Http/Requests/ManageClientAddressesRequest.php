<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageClientAddressesRequest extends FormRequest
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
            'address_id' => ['required', 'exists:addresses,id'],
            'client_id' => ['required', 'exists:addresses,id']
        ];
    }

    public function all ($keys = null)
    {
        $data = parent::all($keys);

        $data['address_id'] = $this->route('address_id');
        $data['client_id'] = $this->route('client_id');

        return $data;
    }
}
