<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cracking extends Model
{

    // Model de craquages
    use HasFactory;
    protected $fillable =[
        'numbercigarette',
        'project_id',
        
    ];

    //relation de clef externe

    public function projects(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
   
}

