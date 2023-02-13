<?php

namespace App\Http\Controllers;

use DB;
use View;
use App\Models\compania;
use Illuminate\Http\Request;

class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $compania = compania::find($request->vista);

        return $compania;
    }

    Public function vista_compania(){
      return View::make('compania')->render();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $compania = new Compania;
        $compania->nombre           = $request->nombre;
        $compania->telefono         = $request->telefono;
        $compania->webSite          = $request->webSite;
        $compania->logo             = $request->logo->store('public');
        $compania->save();
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
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function show(compania $compania)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function edit(compania $compania)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compania $compania)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function destroy(compania $compania)
    {
        //
    }
}
