<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registro(Request $request)
    {
        $request->validate(
           [
               'email'=>'required|email',
               'password'=>'required',
               'edad'=>'required'
           ]);

           $usuario= new User();
           $usuario->email=$request->email;
           $usuario->password=Hash::make($request->password);
           $usuario->edad=$request->edad;
           if($usuario->save())
               return response()->json($usuario,201);
            return abort(400,"Error al crear usuario");
    }

}
