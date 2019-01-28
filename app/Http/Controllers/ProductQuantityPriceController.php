<?php

namespace App\Http\Controllers;

use App\ProductQuantityPrice;
use App\Http\Resources\ProductQuantityPriceResource;
use App\Repositories\CRUDRepository;
use Illuminate\Http\Request;

class ProductQuantityPriceController extends Controller
{
    private $productQuantityPrice;

    public function __construct(ProductQuantityPrice $productQuantityPrice)
    {
        $this->productQuantityPrice = new CRUDRepository($productQuantityPrice);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductQuantityPriceResource::collection($this->productQuantityPrice->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductQuantityPrice  $productQuantityPrice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ProductQuantityPriceResource::withoutWrapping();

        return new ProductQuantityPriceResource(ProductQuantityPrice::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductQuantityPrice  $productQuantityPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductQuantityPrice $productQuantityPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductQuantityPrice  $productQuantityPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductQuantityPrice $productQuantityPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductQuantityPrice  $productQuantityPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductQuantityPrice $productQuantityPrice)
    {
        //
    }

    public function filterByProductConfigurationID($product_configuration_id)
    {
        return ProductQuantityPriceResource::collection(
            ProductQuantityPrice::where(
                'product_configuration_id',
                $product_configuration_id
            )
            ->get()
        );
    }
}
