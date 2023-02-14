<?php

namespace App\Http\Controllers;

use App\Models\detalle_documento;
use Illuminate\Http\Request;

class DetalleDocumentoController extends Controller
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
     * @param  \App\Models\detalle_documento  $detalle_documento
     * @return \Illuminate\Http\Response
     */
    public function show(detalle_documento $detalle_documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalle_documento  $detalle_documento
     * @return \Illuminate\Http\Response
     */
    public function edit(detalle_documento $detalle_documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detalle_documento  $detalle_documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $detalledocs = detalle_documento::find($request->id_doc);
        $detalledocs->chekc_documento = $request->documento ?? '';
        $detalledocs->save();
        
        $docs = detalle_documento::join("documentos","documentos.id", "=", "detalle_documentos.id_documento")
        ->select('documentos.nombre_doc','detalle_documentos.*')
        ->where("documentos.estado_doc","=",1)
        ->where("detalle_documentos.id_registro","=",$request->idregistro)
        ->get();

        return $docs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalle_documento  $detalle_documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(detalle_documento $detalle_documento)
    {
        //
    }
}
