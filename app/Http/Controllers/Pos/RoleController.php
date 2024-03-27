<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    
    // AllPermission
    public function AllPermission(){
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permissions'));
    }

    // AddPermission
    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }
    
    public function StorePermission(Request $request){

        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
     
        $notification = [
            'message' => 'Permiso Añadido Correctamente',
            'alert-type' => 'success'
        ];
     
        return redirect()->route('all.permission')->with($notification);
     
     }


}
