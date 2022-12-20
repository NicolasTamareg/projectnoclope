<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function getFullUsers(){

        // recupere tout les utilisateur coter admin
        $listusers=User::all();

    
        return response()->json(['message'=>'User all liste.','user'=>$listusers],200);
            
        
    }
    public function getFullUsersProject(){

        //recupere tout les projects coter admin
            
        $users =DB::table('users')->join('projects', 'users.id', '=', 'projects.user_id')->get();

    
        return response()->json(['message'=>'User Project check','userproject'=>$users],200);
            
        
    }

    

}
