<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    ///////////////////////////// REGISTRO DE USUARIOS//////////////////////////////////////////////////
    public function register (Request $request ){
        
        $response = ["success" => false];

        //validacion de DATOS
        $validator = Validator::make($request->all(),[

            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        // captura de errores 
        if($validator->fails()){

            $response = ["error"=>$validator->errors()];
            return response()->json($response, 200);

        }

        $input = $request->all();
        $input["password"]= bcrypt($input['password']);  //encriptacion de contraseña

        $user = User::create($input); 
        $user->assignRole('client');

        $response["success"] = true;
        //$response["token"]= $user->createToken("Token")->plainTextToken;

        return response () -> json ($response, 200);
    }
/////////////////////////////////// LOGIN /////////////////////////////////////////////////////////////
    public function login (Request $request){

        $response = ["success" => false];

        //validacion de DATOS
        $validator = Validator::make($request->all(),[
    
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // captura de errores 
        if($validator->fails()){

            $response = ["error"=>$validator->errors()];
            return response()->json($response, 200);

        }

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = auth()->user();
            $user -> hasRole('client'); 
            $response['token'] = $user->createToken("Token")->plainTextToken;
            $response['user'] = $user;
            $response['messagge'] = "Bienvenido";
            $response['success'] = true;
        }
        
        return response()->json($response, 200);

    }
////////////////////////////////// LOGOUT////////////////////////////////////////////////////////////////
    public function logout (){

        $response = ["success" => false];

        auth()->user()->tokens()->delete();

        $response = ["success" => true,
                     "message" => "sesion cerrada"  
        ];
        return response()->json($response, 200);
    }

}
