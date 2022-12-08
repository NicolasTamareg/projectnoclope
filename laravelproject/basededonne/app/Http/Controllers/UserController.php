<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function store(Request $request)
    {

    //    cretation d'un utilisateur

        $request->validate([
            'role' => 'required|string|max:255',
            'numbercard' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => ['required','string','max:255', Password::min(8)->numbers(), Password::min(8)->symbols(), Password::min(8)->mixedCase(),Password::min(8)->letters()]
            // un mot de passe de minimum 8 caractères et comportant une lettre, un chiffre et un symbole. 
      
        ]); 
        

        // $infosuser=[

        //     'role'=>$request->role,           
        //     'numbercard'=>$request->numbercard,          
        //     'firstname'=>$request->firstname,          
        //     'lastname'=>$request->lastname,          
        //     'email'=>$request->email,          
        //     'password' =>$request->password,
        //     // Hash::make($request->password)
        // ];

         $user=User::create([
            'role'=>$request->role,           
            'numbercard'=>$request->numbercard,          
            'firstname'=>$request->firstname,          
            'lastname'=>$request->lastname,          
            'email'=>$request->email,          
            'password' =>$request->password,
            // Hash::make($request->password)

         ]);
        
        return response()->json(['message'=>'user created','user'=>$user],201);
    } 
    

    //
}
