<?php

namespace App\Http\Controllers;

use DB;
use View;
use Storage;
use DataTables;
use App\Models\compania;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $compania = compania::find($request->vista);

        return $compania;
    }

    Public function vista_compania(){
      return View::make('compania')->render();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rutaimagen = $request->logo->store('public');
        $ruta = str_replace('public/','',$rutaimagen);
       
        $compania = new compania;
        $compania->nombre           = $request->nombre;
        $compania->telefono         = $request->telefono;
        $compania->webSite          = $request->webSite;
        $compania->logo             = $ruta;
        $compania->estado_compania = 1;
        $compania->save();
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
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $sql = "SELECT * FROM `companias` where `estado_compania`= 1 " ;
        $Sql = DB::select($sql);
        
        return response()->json($Sql); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compania = compania::select("companias.*")
        ->where("companias.id","=",$id)
        ->get();
        
        return response()->json($compania);  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
        {
            $compania = compania::find($request->id);
            $newImage = $request->file('logo');
        
            if ($newImage) {
                Storage::delete($compania->logo); // eliminar la imagen anterior
                $rutaimagen = $request->logo->store('public/');// guardar la nueva imagen
                $ruta = str_replace('public/','',$rutaimagen);
                $compania->logo = $ruta; // actualizar el campo de la base de datos
            }
            
            $compania->nombre           = $request->nombre;
            $compania->telefono         = $request->telefono;
            $compania->webSite          = $request->webSite;
            $compania->estado_compania = 1;
       
            $compania->save(); // guardar el modelo actualizado
        
            return 1;
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compania = compania::find($id);
        $compania->estado_compania = 0;
        $compania->save();
        return 1 ;
    }
}
