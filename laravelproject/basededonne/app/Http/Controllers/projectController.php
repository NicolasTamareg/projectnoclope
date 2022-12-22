<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Stripe\Stripe;
use Stripe\StripeClient;

class ProjectController extends Controller
{
    
    public function index()
    { 
      
        $projectUser = Project::where('user_id',Auth::user()->id)->get();
        return response()->json(['projectUser'=>$projectUser]);
      
    }

    public function create()
    { $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       //a mettre dans le controlleur du projet
          $stripe->paymentIntents->create([
            'amount' => 2000,
            'currency' => 'eur',
            'payment_method_types' => ['card'],
            'customer' =>['id'],
            // 'customer' => $user->client_stripe_id,
            ['payment_method' => 'pm_card_visa'],
          ]);
          $stripe->paymentIntents->confirm(
            'pi_3MGSafGg161a08f00TAntVgt',
            ['payment_method' => 'pm_card_visa']
          );

          return view('update-payment-method', [
            'intent' => $customer->createSetupIntent()
        ]);
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

     public function show( )
    {
        $projectUser = Project::where('user_id',Auth::user()->id)->get();
        return response()->json(['projectUser'=>$projectUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $project = Project::findOrFail(Auth::user()->id);

        return  response()->json(['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $projectDelete = Project::where("user_id", Auth::user()->id)->firstOrFail();;
        $projectDelete->delete();
    }
}



