<?php

namespace App\Http\Controllers;

use App\Models\documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
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
        $doc = new documento;
        $doc->nombre_doc = $request->nombredoc;
        $doc->estado_doc = 1 ;
        $doc->save();
        return 1 ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $doc = documento::where("documentos.estado_doc","=",1)->get();

        return response()->json($doc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doc = documento::find($id);
        return response()->json($doc);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $doc = documento::find($request->iddoc);
        $doc->nombre_doc = $request->nombredoc;
        $doc->save();
        return 1 ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = documento::find($id);
        $doc->estado_doc = 0;
        $doc->save();
        return 1 ;
    }
}
