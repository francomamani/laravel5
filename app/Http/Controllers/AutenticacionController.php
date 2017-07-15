<?php

namespace App\Http\Controllers;
//Sirve para verificar las credenciales de autenticacion
use JWTAuth;
//Capturar errores tras la creacion del token
use Tymon\JWTAuth\Exceptions\JWTException;
//No sirve para mandar datos de un formulario
use Illuminate\Http\Request;
use App\User;
class AutenticacionController extends Controller
{
    
    public function autenticar(Request $request)
    {
    	$credenciales = $request->only('email','password');
    	/*
			$email = $request->input('email');
			$password = $request->input('password');
			$credenciales = ["email"=>$email, "password"=>$password];
    	*/
		try{
			if (!$token = JWTAuth::attempt($credenciales) ) {
				return response()->json(['error'=>'credenciales_invalidas'], 401);
			}

		}catch(JWTException $e){
			return response()->json(['error'=> 'no_se_creo_el_token'], 500);
		}
		return response()->json(['token'=>$token], 200);
    }

    public function registrarUsuario(Request $request)
    {
    	$usuario = User::create([
	    		'name'=> $request->input('name'),
	    		'email'=> $request->input('email'),
	    		'password'=> encrypt($request->input('password'))
	    	]);
    	$token = JWTAuth::fromUser($usuario);
    	return response()->json(['token'=>$token], 201);
    }
}
