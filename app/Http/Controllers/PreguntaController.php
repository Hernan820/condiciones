<?php

namespace App\Http\Controllers;

use App\Models\pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
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
        $pregunta = new pregunta(); 
        $pregunta->titulo_pregunta     = $request->title; 
        $pregunta->id_cuestionario     = $request->iden_cuestionario; 
        $pregunta->id_categoria        = $request->category; 
        $pregunta->estado_pregunta  = 1;

        $pregunta->save();
    }

    public function namecuestionario(){
        $sql = "SELECT * FROM `cuestionarios` where estado_cuestionario = 1" ;
        $Sql = DB::select($sql);
        return response()->json($Sql); 
    }

    public function categoriaName(){
        $sql = "SELECT * FROM `categorias`where estado_categoria = 1" ;
        $Sql = DB::select($sql);
        return response()->json($Sql); 
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
     * @param  \App\Models\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pregunta = pregunta::join("cuestionarios","preguntas.id_cuestionario", "=", "cuestionarios.id")
        ->join("categorias","preguntas.id_categoria", "=", "categorias.id")
        ->select("preguntas.titulo_pregunta","cuestionarios.nombre","categorias.nombre_categoria","preguntas.id")
        ->where("preguntas.estado_pregunta","=","1")
        ->get();


        return response()->json($pregunta); 
        
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta = pregunta::join("cuestionarios","preguntas.id_cuestionario", "=", "cuestionarios.id")
        ->join("categorias","preguntas.id_categoria", "=", "categorias.id")
        ->select("preguntas.titulo_pregunta","cuestionarios.id as idcuestionario","categorias.id as idcategoria","preguntas.id as id_pregunta")
        ->where("preguntas.estado_pregunta","=","1")
        ->where("preguntas.id","=",$id)
        ->get();

        return response()->json($pregunta); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pregunta = pregunta::find($request->idPregunta);
        $pregunta->titulo_pregunta     = $request->title; 
        $pregunta->id_cuestionario     = $request->iden_cuestionario; 
        $pregunta->id_categoria        = $request->category; 
        $pregunta->estado_pregunta  = 1;
        $pregunta->save();

        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(pregunta $pregunta)
    {
        //
    }
}
