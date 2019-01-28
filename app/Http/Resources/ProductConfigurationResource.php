<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductConfigurationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                      => $this->id,
            'name'                    => $this->name,
            'price'                   => $this->price,
            'paper_format'            => $this->paper_format,
            'page'                    => $this->page,
            'paper_type'              => $this->paper_type,
            'product_quantity_prices' => $this->product_quantity_prices,
            'created_at'              => (string) $this->created_at,
            'updated_at'              => (string) $this->updated_at,
        ];
    }
}
