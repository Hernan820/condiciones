<?php

namespace App\Http\Controllers;

use App\Models\banco;
use Illuminate\Http\Request;

class BancoController extends Controller
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
    {/*
        $banco = new banco;
        $banco->nombre_banco = $request->banconombre;
        $banco->save();*/

        return $request->banconombre;
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
     * @param  \App\Models\banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show(banco $banco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function edit(banco $banco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banco $banco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function destroy(banco $banco)
    {
        //
    }
}
