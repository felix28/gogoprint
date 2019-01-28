<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductQuantityPriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $unit_price       = $this->product_configuration['price'] + $this->price_per_piece;
        $base_price       = $unit_price * $this->quantity;
        $total_one_day    = $base_price + ($base_price * 0.50);
        $total_two_days   = $base_price + ($base_price * 0.30);
        $total_three_days = $base_price + ($base_price * 0.15);

        return [
            'id'                    => $this->id,
            'product_configuration' => $this->product_configuration,
            'quantity'              => $this->quantity,
            'price_per_piece'       => $this->price_per_piece,
            'unit_price'            => $unit_price,
            'base_price'            => $unit_price * $this->quantity,
            'total_one_day'         => $total_one_day,
            'total_two_days'        => $total_two_days,
            'total_three_days'      => $total_three_days,
            'created_at'            => (string) $this->created_at,
            'updated_at'            => (string) $this->updated_at
        ];
    }
}
