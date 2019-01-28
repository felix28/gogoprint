<?php

namespace App\Http\Controllers;

use App\PaperFormat;
use App\Http\Resources\PaperFormatResource;
use App\Repositories\CRUDRepository;
use Illuminate\Http\Request;

class PaperFormatController extends Controller
{
    private $paperFormat;

    public function __construct(PaperFormat $paperFormat)
    {
        $this->paperFormat = new CRUDRepository($paperFormat);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PaperFormatResource::collection($this->paperFormat->all());
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
     * @param  \App\PaperFormat  $paperFormat
     * @return \Illuminate\Http\Response
     */
    public function show(PaperFormat $paperFormat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaperFormat  $paperFormat
     * @return \Illuminate\Http\Response
     */
    public function edit(PaperFormat $paperFormat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaperFormat  $paperFormat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaperFormat $paperFormat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaperFormat  $paperFormat
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperFormat $paperFormat)
    {
        //
    }
}
