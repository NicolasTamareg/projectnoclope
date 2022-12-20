<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

 // Envoi du mail a tout les contacts pour le "je vais craquer"
    public function helpcontact(){
        $user=Auth::user();
        $user_id = Auth::user()->id;
        $angels=Contact::where("user_id","=",$user_id)->get();
        
        

        foreach($angels as $angel){
                
                $data= array (

                    'lastname'=>$angel->lastname,
                    'lastnameUser'=>$user->lastname,
                    'firstnameUser'=>$user->firstname,
                );

                Mail::send('mailcrack', $data, function ($message) use ($angel,) {
                    $message->to($angel->email);//
                    $message->subject('Équipe-Noclope:Cracking');
                    $message->from('contact@noclope.com', 'No clope');
                    
              });
        }

    

        return response()->json(['emailangel'=>$angels,'message'=>'Email envoyer'],200);
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {

        // recuper tout les contacts de l'utilisateur connecter
        $user_id = Auth::user()->id;
        $contacts = Contact::where("user_id", "=", $user_id)->get();
        return response()->json(['contacts'=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
      
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        // formulaire d'ajout de contact 
        $user=User::findOrFail(Auth::user()->id);
        $user_id = Auth::user()->id;
        $project_id = Project::where('user_id', $user_id)->firstOrFail()->id;

        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
            
        ]);
        
        $contact = Contact::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'user_id'=> $request-> user_id = Auth::user()->id,
        ]);
       
            $contact->save();

            
            $data = array(
                'name'=> $contact->firstname,
                'lastname'=>$user->lastname,
                'firstname'=>$user->firstname,
                'email'=>$contact->email,
        
            );
    
        //envoi du mail au contact pour demande d'ange


        Mail::send('mail', $data, function ($message) use ($contact,) {
            $message->to($contact->email)->subject('Équipe-Noclope:Ange gardien');
            $message->from('contact@noclope.com', 'No clope');
      });
      
        return response()->json(['message'=>'Contact created.','contact'=>$contact],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invitation(Request $request)
    {
        
     
        $contact = Contact::findOrFail($request->email);

        $contact->verified=1;

        $contact->save();
        
        
         
        

        // $user_id = Auth::user()->id;

       

        

       

        return response()->json(['message'=>'Contact recupe.','contact'=>$contact],200);
    }
}
