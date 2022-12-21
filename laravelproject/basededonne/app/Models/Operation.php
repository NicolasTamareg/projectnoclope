<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    // model des oppertations
    use HasFactory;
    protected $fillable =[
        'amount',
        'user_id',
        'project_id',
        
    ];
    //relation des clefs externes

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function projects(){
        return $this->belongsTo(Project::class,'project_id','id');
    }

}
