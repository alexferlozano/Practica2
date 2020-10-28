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
               'name'=>'required',
               'email'=>'required|email',
               'password'=>'required',
               'edad'=>'required'
           ]);

           $usuario= new User();
           $usuario->name=$request->name;
           $usuario->email=$request->email;
           $usuario->password=Hash::make($request->password);
           $usuario->edad=$request->edad;
           if($usuario->save())
               return response()->json($usuario,201);
            return abort(400,"Error al crear usuario");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales son incorrectas'],
            ]);
        }
        $token=$user->createToken($request->email,['user:info'])->plainTextToken;
        return response()->json(["token"=>$token],201);
    }

    public function logout(Request $request)
    {
        return response()->json(["eliminados"=>$request->user()->tokens()->delete()],201);
    }
}
