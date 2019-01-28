<?php

namespace App\Http\Controllers;

use App\ProductConfiguration;
use App\Http\Resources\ProductConfigurationResource;
use App\Repositories\CRUDRepository;
use Illuminate\Http\Request;

class ProductConfigurationController extends Controller
{
    private $productConfiguration;

    public function __construct(ProductConfiguration $productConfiguration)
    {
        $this->productConfiguration = new CRUDRepository($productConfiguration);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductConfigurationResource::collection($this->productConfiguration->all());
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
     * @param  \App\ProductConfiguration  $productConfiguration
     * @return \Illuminate\Http\Response
     */
    public function show(ProductConfiguration $productConfiguration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductConfiguration  $productConfiguration
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductConfiguration $productConfiguration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductConfiguration  $productConfiguration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductConfiguration $productConfiguration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductConfiguration  $productConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductConfiguration $productConfiguration)
    {
        //
    }

    public function filterByFormatPageType($paper_format_id, $page_id, $paper_type_id)
    {
        $matchThese = [
            'paper_format_id' => $paper_format_id,
            'page_id'         => $page_id,
            'paper_type_id'   => $paper_type_id
        ];
        
        return ProductConfigurationResource::collection(
            ProductConfiguration::where($matchThese)->get()
        );
    }
}
