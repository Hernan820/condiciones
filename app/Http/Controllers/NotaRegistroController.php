<?php

namespace App\Http\Controllers;

use App\Models\nota_registro;
use Illuminate\Http\Request;
//date_default_timezone_set("America/New_York");
date_default_timezone_set("America/El_Salvador");

class NotaRegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nota = new nota_registro;
        $nota->nota_registro    =  $request->nota_seguimiento;
        $nota->nombre_usuario   =  auth()->user()->name;
        $nota->fecha            =  date('Y-m-d');
        $nota->hora             =  date('H:i:s'); 
        $nota->id_registro      =  $request->id_registro;
        $nota->save();
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
     * @param  \App\Models\nota_registro  $nota_registro
     * @return \Illuminate\Http\Response
     */
    public function show(nota_registro $nota_registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nota_registro  $nota_registro
     * @return \Illuminate\Http\Response
     */
    public function edit(nota_registro $nota_registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nota_registro  $nota_registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nota_registro $nota_registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nota_registro  $nota_registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(nota_registro $nota_registro)
    {
        //
    }
}
