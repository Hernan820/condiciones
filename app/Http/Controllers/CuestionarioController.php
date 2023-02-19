<?php

namespace App\Http\Controllers;

use View;
use App\Models\cuestionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $cuestionario->detalle     = $request->detalle; 
        $cuestionario->nombre      = $request->name; 
        $cuestionario->flag        = $request->flag; 
        $cuestionario->estado_cuestionario = 1;

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
    public function show( Request $request)
    {
        $sql = "SELECT * FROM `cuestionarios` where `estado_cuestionario`= 1 " ;
        $Sql = DB::select($sql);
        
        return response()->json($Sql); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuestionario = cuestionario::select("cuestionarios.*")
        ->where("cuestionarios.id","=",$id)
        ->get();
        
        return response()->json($cuestionario);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cuestionario = cuestionario::find($request->id);
        $cuestionario->fecha       = $request->date; 
        $cuestionario->detalle     = $request->detalle; 
        $cuestionario->nombre      = $request->name; 
        $cuestionario->flag        = $request->flag; 
        $cuestionario->estado_cuestionario = 1;

        $cuestionario->save();

        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuestionario = cuestionario::find($id);
        $cuestionario->estado_cuestionario = 0;
        $cuestionario->save();
        return 1 ;
    }
}
