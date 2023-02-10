<?php
           
namespace App\Http\Controllers;
            

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

         
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
        $User->phone2           = $request->phone2;
        $User->password        = Hash::make($request->password);
        $User->estado_user = 1; 
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

    
    public function show(){
        $Users = User::join("model_has_roles","users.id", "=", "model_has_roles.model_id")
        ->join("roles","roles.id", "=", "model_has_roles.role_id")
        ->select("users.*","roles.name as namerole")
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
        $Users = User::join("model_has_roles","users.id", "=", "model_has_roles.model_id")
        ->join("roles","roles.id", "=", "model_has_roles.role_id")
        ->select("users.*","roles.name as namerole")
        ->where("users.estado_user","=","1")
        ->where("users.id","=",$id)
        ->get();
        
        return response()->json($Users);     
    }

    public function update(Request $request)
    {
        $User = User::findOrFail($request->id);
        
        $User->name            = $request->name;
        $User->email           = $request->email;
        $User->phone           = $request->phone;
        $User->phone2           = $request->phone2;
        if ($request->cambiocontra == 1) {
            $User->password        = Hash::make($request->password);
        }
        
        $User->save();
        $User->roles()->detach();
        $User->assignRole($request->typeRole);

        return 1;
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