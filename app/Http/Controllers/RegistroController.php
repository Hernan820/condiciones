<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use App\Models\detalle_documento;
use App\Models\cuestionario_cliente;
use App\Models\clientes_registro;
use App\Models\registro;
use Illuminate\Http\Request;
use DB;
use App\Models\prestamo;
use App\Models\respuesta_cliente;

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
        $registro->dowpayment      = $request->dowpayment ?? '';
        $registro->precio_casa     = $request->purchaceprice ?? '';    #tamnien   ES EL PRUCHARSE 
        $registro->estado          = $request->estadocasa;
        $registro->drive           = $request->drive ?? '';
       // $registro->num_prestamo    = $request->              #MAS ADELANTE SE LLENARAN
        $registro->direccion_casa  = $request->property_address ?? '';
        $registro->notas           = $request->notes ?? '';
        $registro->procesador      = $request->realtorname ?? '';
        $registro->telefono_precesador      = $request->realtorphone ?? '';

        //$registro->Appraisal       = $request->             #MAS ADELANTE SE LLENARAN
        $registro->id_etapa        = 1; 
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
            $cliente->correo               = $request->email[$index] ?? '';  
            $cliente->direccion            = $request->direccion[$index] ?? '';
            $cliente->direcionalternativa  = $request->direccion2[$index] ?? '';
            $cliente->status               = $request->status[$index];
            $cliente->socials_number       = $request->securityn[$index] ?? '';
            $cliente->tipe_client          = $request->typeclient[$index];
            $cliente->save();

           $detallecliente =  new clientes_registro;
           $detallecliente->id_cliente             = $cliente->id;
           $detallecliente->id_registro            = $registro->id;
           $detallecliente->titular                = $request->typeclient[$index];
           $detallecliente->estado_clienteregistro = 1;
           $detallecliente->save() ;
            $index++;

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

                    $preguntas = DB::select("SELECT * FROM `preguntas` WHERE preguntas.id_cuestionario = $cuestionario AND preguntas.estado_pregunta = 1;");

                    foreach ($preguntas as $pregunta) {
                    $respuestascliente = new respuesta_cliente;
                    $respuestascliente->id_cuestionario_clientes = $cuestionario_client->id;
                    $respuestascliente->id_pregunta              = $pregunta->id;
                    $respuestascliente->respuesta                = '';
                    $respuestascliente->save();
                    }
               };
        }

        foreach ($request->chekcdocument as $docs) {
            $id_doc = explode("_", $docs);
                if(count($id_doc) == 1){
                    $documentos_client = new detalle_documento;
                    $documentos_client->id_registro  = $registro->id;
                    $documentos_client->id_documento = $id_doc[0];
                    $documentos_client->chekc_documento  = 1;
                    $documentos_client->save();
                }else{
                    $documentos_client = new detalle_documento;
                    $documentos_client->id_registro  = $registro->id;
                    $documentos_client->id_documento = $id_doc[0];
                    $documentos_client->chekc_documento  = 0;
                    $documentos_client->save();   
                }
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
        $sql = "SELECT prestamos.*, clientes.*, registros.*, registros.id as idregister FROM `registros` 
        INNER JOIN clientes_registros on clientes_registros.id_registro = registros.id
        INNER JOIN clientes on clientes.id = clientes_registros.id_cliente
        INNER JOIN prestamos on prestamos.id = registros.id_prestamo
        WHERE registros.id_etapa  in($id)  AND clientes.tipe_client = 1  AND registros.id_estado != 3;";

        $registros = DB::select($sql);

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
    public function update(Request $request)
    {
        $registro =  registro::find($request->idregistro);

        if($request->fecharecep != '' && $request->fechafirma != ''){
            $registro->fecha_recepcion = $request->fecharecep;
            $registro->fecha_firma     = $request->fechafirma;
        }
        $registro->estado          = $request->estadocasa ?? '';
        $registro->direccion_casa  = $request->direccionregistro ?? '';
        $registro->precio_casa     = $request->preciocasa ?? '';    #tamnien   ES EL PRUCHARSE 
        $registro->dowpayment      = $request->dowpayment ?? '';
        $registro->procesador      = $request->procesadorname ?? '';
        $registro->telefono_precesador      = $request->telefonoprecesor ?? '';
        $registro->drive      = $request->drive ?? '';
        $registro->id_prestamo     = $request->id_prestamo ;       
        $registro->notas     = $request->registronota ?? '' ;       

        //$registro->num_prestamo    = $request->              #MAS ADELANTE SE LLENARAN
       // $registro->Appraisal       = $request->             #MAS ADELANTE SE LLENARAN
        $registro->save(); 

       $detalleresgitro = registro::join("users","users.id", "=", "registros.id_usuario")
       ->join("prestamos","prestamos.id", "=", "registros.id_prestamo")
       ->join("etapas","etapas.id", "=", "registros.id_etapa")
       ->select('registros.*','users.*','prestamos.*','etapas.*')
       ->where('registros.id','=',$request->idregistro)
       ->get();

        $prestamos =prestamo::all();
              
        return response()->json(['detalleresgitro' => $detalleresgitro, 'prestamos' => $prestamos],200);
    }

    /**
     * 
     * 
     * 
     */
    public function updatefechas(Request $request){

        $registro =  registro::find($request->idregistro);

        if($request->fecharecep != '' && $request->fechafirma != ''){
            $registro->fecha_recepcion = $request->fecharecep;
            $registro->fecha_firma     = $request->fechafirma;
        }

        $registro->save();

        $detalleresgitro = registro::join("users","users.id", "=", "registros.id_usuario")
        ->join("prestamos","prestamos.id", "=", "registros.id_prestamo")
        ->join("etapas","etapas.id", "=", "registros.id_etapa")
        ->select('registros.*','users.*','prestamos.*','etapas.*')
        ->where('registros.id','=',$request->idregistro)
        ->get();
 
         $prestamos =prestamo::all();
               
         return response()->json(['detalleresgitro' => $detalleresgitro, 'prestamos' => $prestamos],200);

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
        $registro->id_estado = 3 ;
        $registro->motivo = $request->motivo_cancel;
        $registro->save();
        return 1 ;
    }
/**
 * 
 * cambia estado danado
 * 
 */
    function danado($estado,$id){

        $registro= registro::find($id);
        $registro->id_estado = $estado;
        $registro->save();
        return 1 ;

    }
    /**
     * Remove the specified resource from sto
     */
    public function etapa($etapa,$id)
    {

    $registro= registro::find($id);
    $registro->id_etapa  = $etapa ;
    $registro->save();

    return 1 ;

    } 
    /**
     * Remove the specified resource from sto
     */
    public function reporte($id){

        $sql = "SELECT prestamos.*, clientes.*, registros.*, registros.id as idregister FROM `registros` 
        INNER JOIN clientes_registros on clientes_registros.id_registro = registros.id
        INNER JOIN clientes on clientes.id = clientes_registros.id_cliente
        INNER JOIN prestamos on prestamos.id = registros.id_prestamo
        WHERE registros.id in($id)  AND clientes.tipe_client = 1
        LIMIT 1;";

        $sql1="SELECT documentos.* FROM registros
        INNER JOIN detalle_documentos on detalle_documentos.id_registro = registros.id
        INNER JOIN documentos on documentos.id = detalle_documentos.id_documento
        WHERE registros.id = $id AND documentos.estado_doc = 1;";

        $registros = DB::select($sql);
        $doc = DB::select($sql1);
        return response()->json(['registros' => $registros, 'doc' => $doc],200);
    }
    /**
     * 
     * muestra registros con el estado cancelados
     * 
     */
    public function cancel($id)
    {
        $sql = "SELECT prestamos.*, clientes.*, registros.*, registros.id as idregister FROM `registros` 
        INNER JOIN clientes_registros on clientes_registros.id_registro = registros.id
        INNER JOIN clientes on clientes.id = clientes_registros.id_cliente
        INNER JOIN prestamos on prestamos.id = registros.id_prestamo
        WHERE  clientes.tipe_client = 1  AND registros.id_estado = $id;";
        $registros = DB::select($sql);

        return response()->json($registros);        
    }
}
