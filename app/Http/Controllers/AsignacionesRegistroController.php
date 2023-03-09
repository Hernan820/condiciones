<?php

namespace App\Http\Controllers;

use App\Models\asignaciones_registro;
use Illuminate\Http\Request;

class AsignacionesRegistroController extends Controller
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
    public function asignar(Request $request)
    {
        $separada = explode(',', $request->usuariosselect);

        foreach ($separada as $idusuario) {
            $asiganarregistro = new asignaciones_registro;
            $asiganarregistro->id_usuario  = $idusuario;
            $asiganarregistro->id_registro  = $request->idregistro;
            $asiganarregistro->save();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asignaciones_registro  $asignaciones_registro
     * @return \Illuminate\Http\Response
     */
    public function show(asignaciones_registro $asignaciones_registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asignaciones_registro  $asignaciones_registro
     * @return \Illuminate\Http\Response
     */
    public function edit(asignaciones_registro $asignaciones_registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asignaciones_registro  $asignaciones_registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asignaciones_registro $asignaciones_registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asignaciones_registro  $asignaciones_registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignaciones_registro $asignaciones_registro)
    {
        //
    }
    /**
     * 
     */
    public function usuariosasigancion($id){
        $asiganacion = asignaciones_registro::where("asignaciones_registros.id_registro","=",$id)->get();
        return  $asiganacion;
    }
}
