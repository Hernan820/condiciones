<?php

namespace App\Http\Controllers;

use App\Models\prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
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
     * @param  \App\Models\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $prestamo = prestamo::where("prestamos.estado_prestamo","=",1)->get();

        return response()->json($prestamo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(prestamo $prestamo)
    {
        //
    }
}
