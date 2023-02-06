<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use App\Models\detalle_documento;
use App\Models\cuestionario_cliente;
use App\Models\clientes_registro;
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
        $registro->id_usuario      = auth()->user()->id; 
        $registro->id_estado       = 1;
        $registro->id_compania     = 1;
        $registro->estado_registro = 1; 
        $registro->save();


        
        $index = 0;
        foreach ($request->nombres  as $name) {
            $cliente = new cliente;
            $cliente->nombre_cliente       = $name;
            $cliente->telefono             = $request->tel[$index];
            $cliente->correo               = $request->email[$index];
            $cliente->direccion            = $request->direccion[$index];
            $cliente->direcionalternativa  = $request->direccion2[$index];
            $cliente->status               = $request->status[$index];
            $cliente->socials_number       = $request->securityn[$index];
            $cliente->tipe_client          = $request->typeclient[$index];
            $cliente->save();

           $detallecliente =  new clientes_registro;
           $detallecliente->id_cliente             = $cliente->id;
           $detallecliente->id_registro            = $registro->id;
           $detallecliente->titular                = $request->typeclient[$index];
           $detallecliente->estado_clienteregistro = 1;
           $detallecliente->save() ;
            $index++;

        }

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
      
      return $request->email ;
        
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
        $registros = registro::join("clientes_registros","clientes_registros.id", "=", "clientes_registros.id_registro")
        ->join("clientes","clientes.id", "=", "clientes_registros.id_cliente")
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
    public function cancelado(request $request)
    {
        $registro= registro::find($request->id_registro);
        $registro->id_estado = 2 ;
        $registro->motivo = $request->motivo_cancel;
        $registro->save();

        return 1 ;
    }

    /**
     * Remove the specified resource from sto
     */
    public function estado($estado,$id)
    {

    $registro= registro::find($id);
    $registro->id_estado = $estado ;
    $registro->save();

    return 1 ;

    }
}
