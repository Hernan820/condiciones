<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = new Role; 
        $roles->name         =  $request->name;
        $roles->guard_name   = 'web';
        $roles->estado_rol   = 1;
        $roles->save();
        
       
        foreach ($request->permiso as $permisos){
            $roles->givePermissionTo($permisos);
        
        }
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

    public function namepermisos(){
        $sql = "SELECT * FROM `permissions`" ;
        $Sql = DB::select($sql);
        return response()->json($Sql); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $sql = "SELECT roles.id, roles.name as namerol, GROUP_CONCAT(permissions.name) AS permisosname FROM roles INNER JOIN role_has_permissions on role_has_permissions.role_id = roles.id INNER JOIN permissions on role_has_permissions.permission_id = permissions.id where roles.estado_rol = 1 GROUP BY roles.id";
      $roles = DB::select($sql);
      return response()->json($roles); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::join("role_has_permissions","role_has_permissions.role_id","=","roles.id")
        ->join("permissions","role_has_permissions.permission_id","=","permissions.id")
        ->select("roles.id","roles.name as namerol","permissions.name")
        ->where("roles.estado_rol","=","1")
        ->where("roles.id","=",$id)
        ->get();

        return response()->json($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\roles $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $roles = Role::find($request->id);
        $roles->name         =  $request->name;
        $roles->guard_name   = 'web';
        $roles->estado_rol   = 1;
        $roles->save();

        $permissions = $request->only('permiso');
        if (count($permissions) > 0) {
            $roles->syncPermissions($permissions);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->estado_rol = 0;
        $roles->save();
        return 1 ;
    }
}
