<?php

namespace App\Http\Controllers;

use App\Models\tareas;
use Illuminate\Http\Request;
use View;
class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('task/index')->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        
        $tareas = new tareas; 
        $tareas->nombre_tarea   = $request->name_tarea; 
        $tareas->descripcion    = $request->descripcion; 
        $tareas->fecha_hora     = $request->datetarea; 
        $tareas->id_usuario     = $request->usuario;
        $tareas->id_estado      = 4;
        $tareas->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function show(tareas $tareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function edit(tareas $tareas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tareas $tareas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function destroy(tareas $tareas)
    {
        //
    }
}
