<?php

namespace App\Http\Controllers;
use App\Models\prestamo;

use App\Models\cliente;
use Illuminate\Http\Request;
use App\Models\registro;
use App\Models\detalle_documento;
use DB;

class ClienteController extends Controller
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
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = cliente::join("clientes_registros","clientes_registros.id_cliente", "=", "clientes.id")
        ->select('clientes.*')
        ->where('clientes_registros.id_registro','=',$id)
        ->orderBy('clientes.tipe_client', 'desc')
        ->get();

        $registro = registro::join("users","users.id", "=", "registros.id_usuario")
        ->join("prestamos","prestamos.id", "=", "registros.id_prestamo")
        ->join("etapas","etapas.id", "=", "registros.id_etapa")
        ->select('registros.*','users.*','prestamos.*','etapas.*')
        ->where('registros.id','=',$id)
        ->get();

        $docs = detalle_documento::join("documentos","documentos.id", "=", "detalle_documentos.id_documento")
        ->select('documentos.nombre_doc','detalle_documentos.*')
        ->where("documentos.estado_doc","=",1)
        ->where("detalle_documentos.id_registro","=",$id)
        ->get();

        $tipopreguntas = DB::select("SELECT preguntas.id, preguntas.titulo_pregunta, cuestionarios.nombre FROM registros
        INNER JOIN clientes_registros on clientes_registros.id_registro = registros.id
        INNER JOIN clientes on clientes.id = clientes_registros.id_cliente
        INNER JOIN cuestionario_clientes on cuestionario_clientes.id_cliente = clientes.id
        INNER JOIN cuestionarios on cuestionarios.id = cuestionario_clientes.id_cuestionario
        INNER JOIN preguntas on preguntas.id_cuestionario = cuestionarios.id
        WHERE registros.id = $id
        GROUP BY preguntas.id;");

       $notas = DB::select("SELECT * FROM `nota_registros` WHERE nota_registros.id_registro = $id ORDER BY id DESC;");

       $tipoprestamos = prestamo::all();

       $preguntasrespuesta = DB::select("SELECT respuesta_clientes.*, registros.id as idregistro,preguntas.id as idpregunta ,preguntas.titulo_pregunta , cuestionarios.nombre ,  clientes.id as idcliente ,clientes.nombre_cliente FROM respuesta_clientes
       INNER JOIN cuestionario_clientes on cuestionario_clientes.id = respuesta_clientes.id_cuestionario_clientes
       INNER JOIN preguntas on preguntas.id = respuesta_clientes.id_pregunta
       INNER JOIN cuestionarios on cuestionarios.id = cuestionario_clientes.id_cuestionario
       INNER JOIN clientes on clientes.id = cuestionario_clientes.id_cliente
       INNER JOIN clientes_registros on clientes_registros.id_cliente = clientes.id
       INNER JOIN registros on registros.id = clientes_registros.id_registro
       WHERE registros.id = $id;");

       return response()->json(['clientes' => $clientes, 'registro' => $registro, 'docs' => $docs, 'tipopreguntas' => $tipopreguntas, 'notas' => $notas, 'tipoprestamos' => $tipoprestamos, 'preguntasrespuesta' => $preguntasrespuesta],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cliente = cliente::find($request->idcliente);
        if($request->nombre != ""){
            $cliente->nombre_cliente      = $request->nombre ?? '';  
        }
        if($request->telefono != ""){
            $cliente->telefono            = $request->telefono ?? '';
        }
        $cliente->correo              = $request->email ?? '';
        $cliente->direccion           = $request->direccion ?? '';
        $cliente->direcionalternativa = $request->direccion2 ?? '';
        $cliente->status              = $request->status ?? '';
        $cliente->socials_number      = $request->ssnumber ?? '';
        $cliente->save();
        
        $clientes = cliente::join("clientes_registros","clientes_registros.id_cliente", "=", "clientes.id")
        ->select('clientes.*')
        ->where('clientes_registros.id_registro','=',$request->idregistro)
        ->orderBy('clientes.tipe_client', 'desc')
        ->get(); 

        return response()->json($clientes);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //
    }
}
