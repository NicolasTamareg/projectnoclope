<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =[
        'numberphone',
        'firstname',
        'lastname',
        'user_id',
        
    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
