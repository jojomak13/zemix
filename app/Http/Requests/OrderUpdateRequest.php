<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'client_name' => 'required|string|min:5|max:255',
            'phone' => 'required|string|min:11|max:11',
            'price' => 'required|numeric',
            'shipping_price' => 'required|numeric',
            'address' => 'required|string',
            'notes' => '',
            'description' => 'string|nullable',
            'driver_id' => 'required',
            'city_id' => 'required',
            'status_id' => 'required',
            'content' => 'required'
        ];
    }
}
