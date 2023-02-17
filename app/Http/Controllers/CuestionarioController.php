<?php

namespace App\Http\Controllers;

use App\Models\cuestionario;
use Illuminate\Http\Request;
use View;

class CuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('cuestionario')->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cuestionario = new cuestionario(); 
        $cuestionario->fecha      = $request->date; 
        $cuestionario->detalle     = $request->detail; 
        $cuestionario->nombre      = $request->name; 
        $cuestionario->flag        = $request->flag; 

        $cuestionario->save();
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
     * @param  \App\Models\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function show( )
    {
        $cuestionario = cuestionario::all();

        return response()->json($cuestionario);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function edit(cuestionario $cuestionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuestionario $cuestionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuestionario $cuestionario)
    {
        //
    }
}
