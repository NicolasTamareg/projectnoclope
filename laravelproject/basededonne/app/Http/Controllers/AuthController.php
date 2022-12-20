<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {

        // authentification de l'utilisateur
        $authuser= User::where('email',$request->email)->first();

        if(is_null($authuser)) {
            return response()->json([
                'message' => "Email ou mot de passe incorrect"
            ], 401);
        }

        if (Hash::check($request->password, $authuser->password) === false){
            return response()->json([
                'message' => "Email ou mot de passe incorrect"
            ], 401);
        }
         // création de token unique et envoi du role "admin"
        return response()->json([
            'is_admin' => $authuser->is_admin,
            'token' => $authuser->createToken(time())->plainTextToken
        ]);

    }

    

    

}
