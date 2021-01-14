<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowClientAddressesRequest extends FormRequest
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
            'client_id' => 'exists:clients,id'
        ];
    }

    public function all ($keys = null)
    {
        $data = parent::all($keys);

        $data['client_id'] = $this->route('client_id');

        return $data;
    }
}
