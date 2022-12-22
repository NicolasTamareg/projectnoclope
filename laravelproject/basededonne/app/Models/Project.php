<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    //model de project
    use HasFactory;
    protected $fillable =[
        'objective',
        'price',
        'pricepack',
        'numbersmoke',
        'user_id',
        
    ];
    //relation des clefs externes
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');

    }
    public function operations(){
        return $this->hasMany(Operation::class,'project_id','id');

    }

    public function crackings(){
        return $this->hasMany(Cracking::class,'project_id','id');
        
    }
   

}
