<?php
           
namespace App\Http\Controllers;
            

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;


          
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     //captura de table user in the database
        $User = new User;
        $User->name            = $request->name;
        $User->email           = $request->email;
        $User->phone           = $request->phone;
        $User->password        = Hash::make($request->password);
        $User->estado_User = 1; 
        $User->save();
        $User->assignRole($request->typeRole);
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

    public function roles(){
        $sql = "SELECT * FROM `roles`" ;
        $Sql = DB::select($sql);
        return response()->json($Sql); 
    }

    public function show()
    {
        $Users = User::select("users.*")
        ->where("users.estado_user","=","1")
        ->get();
        return response()->json($Users); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = User::find($id);
        return response()->json($User);     
    }

    public function update(Request $request)
    {
        $User = User::find($request->id);
        $User->name            = $request->name;
        $User->email           = $request->email;
        $User->phone           = $request->phone;
        $User->password        = Hash::make($request->password);
        $User->save();
        return 1 ;
    }

    public function estado($estado,$id)
    {
        $User= User::find($id);
        $User->estado_user = $estado;
        $User->save();
        return 1 ;
     }
    
    /**
     * Remove the specified resource from storage.
     *
   
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->estado_user = 0;
        $User->save();
        return 1 ;
    }
}