<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use App\Models\detalle_documento;
use App\Models\cuestionario_cliente;

use App\Models\registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
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

        $cliente = new cliente;
        $cliente->nombre_cliente       = $request->nameclient;
        $cliente->telefono             = $request->customerPhone;
        $cliente->correo               = $request->emailclient;
        $cliente->direccion            = $request->inputAddress;
        $cliente->direcionalternativa  = $request->inputAddress2;
        $cliente->status               = $request->radio_status;
        $cliente->socials_number       = $request->ssn;
        $cliente->save();

        $registro = new registro;
        $registro->fecha_recepcion = $request->datereceipt;
        $registro->fecha_firma     = $request->datecontrac;
        $registro->dowpayment      = $request->dowpayment;
        $registro->precio_casa     = $request->purchaceprice ;    #tamnien   ES EL PRUCHARSE 
        $registro->estado          = $request->estadocasa;
        $registro->drive           = $request->drive;
       // $registro->num_prestamo    = $request->              #MAS ADELANTE SE LLENARAN
        $registro->direccion_casa  = $request->property_address;
        $registro->notas           = $request->notes;
        $registro->procesador      = $request->realtorname;
        $registro->telefono_precesador      = $request->realtorphone;

        //$registro->Appraisal       = $request->             #MAS ADELANTE SE LLENARAN
        $registro->id_prestamo     = 1;    
        $registro->id_banco        = 1;                     #MAS ADELANTE SE LLENARAN
        $registro->id_cliente      = $cliente->id;
        $registro->id_usuario      = auth()->user()->id; 
        $registro->id_estado       = 1;
        $registro->id_compania     = 1;
        $registro->estado_registro = 1; 
        $registro->save();

        foreach ($request->chekcdocument as $docs) {
            $documentos_client = new detalle_documento;
            $documentos_client->id_registro  = $registro->id;
            $documentos_client->id_documento = $docs;
            if($docs != ""){
                $documentos_client->chekc_documento  = 1;
            }else{
                $documentos_client->chekc_documento  = 0;
            }
            $documentos_client->save();
        };
         
        foreach ($request->checkcuestionario as $cuestionario) {
            $cuestionario_client = new cuestionario_cliente;
            $cuestionario_client->id_cliente       = $cliente->id;
            $cuestionario_client->id_cuestionario  = $cuestionario;
            if($cuestionario != ""){
                $cuestionario_client->checkcuestionario  = 1;
            }else{
                $cuestionario_client->checkcuestionario  = 0;
            }
            $cuestionario_client->save();
       };
      
      return 1;
        
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
     * @param  \App\Models\registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registros = registro::join("clientes","clientes.id", "=", "registros.id_cliente")
        ->join("prestamos","prestamos.id", "=", "registros.id_prestamo")
        ->select("prestamos.*","clientes.*","registros.*","registros.id as idregister")
        ->where("registros.estado_registro","=",1)
        ->where("registros.id_estado","=",$id)
        ->get();

        return response()->json($registros);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(registro $registro)
    {
        //
    }
}
