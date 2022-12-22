<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    // model contact
    use HasFactory;
    protected $fillable =[
        'id',
        'email',
        'firstname',
        'lastname',
        'token_verifi',
        'user_id',
        'created_at',
        'updated_at',
        
    ];
    //relation de clef externe
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
