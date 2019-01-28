<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'product_configuration_id' => 'required|numeric',
            'configuration_price' => 'required|numeric',
            'price_per_piece' => 'required|numeric',
            'quantity' => 'required|numeric',
            'production_days' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'vat' => 'required|numeric',
            'shipping_fee' => 'required|numeric',
            'total' => 'required|numeric',
            'delivery_date' => 'required|date'
        ];
    }
}
