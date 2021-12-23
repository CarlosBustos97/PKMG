<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /** Funcion para consultar todos los usuarios y mostrarlos */
    public function index(){

        /**Consulta todos los usuarios de forma descente  */
        $users = User::latest()->get();

        /**Retorna todos los usuarios a la vista */
        return view('users.index',[
            'users'=> $users
        ]);
    }

    /** Funcion para guardar un nuevo usuario, recive los datos de formulario */
    public function store(Request $request){
        /**Valida que los datos que llegan del formulario sean validos */
        $request->validate([
            'name'      => 'required',
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8'],
        ]);

        /**Crea un nuevo usuario */
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
        ]);

        /**Retorna a la vista anterior */
        return back();
    }

    /**Funcion para eliminar un usuario, recibe a el usuario a eliminar */
    public function destroy(User $user){        
        /**Elimina el usuario que llega de la vista */
        $user->delete();
        /**Retorna a la vista anterior */
        return back();
    }

    /** Funcion para actualizar un usuario, recibe al usuario y los nuevos datos */
    public function update(User $user, Request $request){
        $request->validate([
            'nameUpdate'      => 'required',
            'emailUpdate'     => ['required', 'email', 'unique:users'],
        ]);

        /** Se asignas los datos al usuario y se guardan */
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        /**Retorna a la vista anterior */
        return back();
    }
}
