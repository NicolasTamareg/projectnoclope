<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProjectController extends Controller
{
    public function store (Request $request)
    {
        $request->validate([
            
            'objective' => 'required|string|max:255',
            'price' => 'required|integer',
            'pricepack' => 'required|integer',
            'numbersmoke' => 'required|integer',
             
      
        ]); 
    }
}
