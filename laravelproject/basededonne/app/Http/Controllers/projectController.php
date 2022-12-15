<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProjectController extends Controller
{
    
    public function index()
    { 
      
       
    }

    public function create()
    { 
      
       
        return view('projects.create');
    }



    public function store (Request $request)
    {
        
        $request->validate([
            
            'objective' => 'required|string|max:255',
            'price' => 'required|integer',
            'pricepack' => 'required|integer',
            'numbersmoke' => 'required|integer',
        ]); 
        $projet = Project::create([
            'user_id'=>Auth::user()->id,
            'objective' => $request->objective,
            'price' => $request->price,
            'pricepack' => $request->pricepack,
            'numbersmoke' => $request->numbersmoke,
        ]);
        $projet->save();
      
        return response()->json(['message'=>'Project created.','projet'=>$projet],201);
    }
    
  
}

