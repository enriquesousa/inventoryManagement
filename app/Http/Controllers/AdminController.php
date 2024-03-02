<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // AdminDestroy
    public function AdminDestroy(Request $request){

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Usuario deslogueado correctamente',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification); 
    }

    // AdminProfile
    public function ViewProfile(){
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    // EditProfile
    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::findOrFail($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    // StoreProfile
    public function StoreProfile(Request $request){
        
        // Para saber que usuario esta logueado
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        // actualizar imagen
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            @unlink(public_path('upload/admin_images/' . $data->profile_image)); // para borrar si ya hay imagen en el directorio
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = $filename;
        }

        $data->save();
        
        // return redirect()->route('admin.view.profile')->with('success', 'Perfil actualizado con éxito');

        // toastr notification
        $notification = array(
            'message' => 'Perfil actualizado con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.view.profile')->with($notification);

    }


    // ChangePassword
    public function ChangePassword(){
        return view('admin.admin_change_password');
    }


    // UpdatePassword
    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'antiguaContraseña' => 'required',
            'nuevaContraseña' => 'required',
            'confirmarContraseña' => 'required|same:nuevaContraseña',
        ]);


        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->antiguaContraseña, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->nuevaContraseña);
            $user->save();

            session()->flash('message', 'Contraseña actualizada correctamente');
            return redirect()->back();

        }else{

            session()->flash('message', 'La antigua contraseña no coincide');
            return redirect()->back();
        }

    }




}
