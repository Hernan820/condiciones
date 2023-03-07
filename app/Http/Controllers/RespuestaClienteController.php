<?php

namespace App\Http\Controllers;
use DB;
use App\Models\respuesta_cliente;
use Illuminate\Http\Request;

class RespuestaClienteController extends Controller
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
     * @param  \App\Models\respuesta_cliente  $respuesta_cliente
     * @return \Illuminate\Http\Response
     */
    public function show(respuesta_cliente $respuesta_cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\respuesta_cliente  $respuesta_cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(respuesta_cliente $respuesta_cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\respuesta_cliente  $respuesta_cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $respuesta = respuesta_cliente::find($request->id_respuesta);
        $respuesta->respuesta = $request->respuestapregunta ?? '';
        $respuesta->save();
        
       $preguntasrespuesta = DB::select("SELECT respuesta_clientes.*, registros.id as idregistro,preguntas.id as idpregunta ,preguntas.titulo_pregunta , cuestionarios.nombre ,   categorias.nombre_categoria,clientes.id as idcliente ,clientes.nombre_cliente FROM respuesta_clientes
       INNER JOIN cuestionario_clientes on cuestionario_clientes.id = respuesta_clientes.id_cuestionario_clientes
       INNER JOIN preguntas on preguntas.id = respuesta_clientes.id_pregunta
       INNER JOIN categorias on categorias.id = preguntas.id_categoria
       INNER JOIN cuestionarios on cuestionarios.id = cuestionario_clientes.id_cuestionario
       INNER JOIN clientes on clientes.id = cuestionario_clientes.id_cliente
       INNER JOIN clientes_registros on clientes_registros.id_cliente = clientes.id
       INNER JOIN registros on registros.id = clientes_registros.id_registro
       WHERE registros.id = $request->idregistro;");

     return response()->json($preguntasrespuesta);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\respuesta_cliente  $respuesta_cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(respuesta_cliente $respuesta_cliente)
    {
        //
    }
}
