<?php

namespace App\Http\Controllers;

use App\PaperType;
use App\Http\Resources\PaperTypeResource;
use App\Repositories\CRUDRepository;
use Illuminate\Http\Request;

class PaperTypeController extends Controller
{
    private $paperType;

    public function __construct(PaperType $paperType)
    {
        $this->paperType = new CRUDRepository($paperType);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PaperTypeResource::collection($this->paperType->all());
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
     * @param  \App\PaperType  $paperType
     * @return \Illuminate\Http\Response
     */
    public function show(PaperType $paperType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaperType  $paperType
     * @return \Illuminate\Http\Response
     */
    public function edit(PaperType $paperType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaperType  $paperType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaperType $paperType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaperType  $paperType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperType $paperType)
    {
        //
    }
}
