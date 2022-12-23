<?php

namespace App\Http\Controllers;

use App\Models\Cracking;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use DateTime;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Date;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{

  
    public function getFullUsersProject()
    {

        $users = DB::table('users')
        ->join('projects', 'user_id', '=', 'projects.user_id')
        ->select('users.*', 'projects.*')
        ->get();

        $getuser = User::all();
        foreach($getuser as $item){
            $project = Project::where('user_id',$item['id'])->first();
         
            $price_cig = $project['pricepack']/20;
            $price_day = $project['numbersmoke'] * $price_cig;
            $date_start = $project['created_at'];

            // Date du jour
            $current_date = Date::now();
            $elapse_days =  $current_date->diff(new DateTime($date_start));

            // Les craquages de l'utilisateur
            $number_cig_smoked=Cracking::where('project_id',$item['id'])->sum('numbercigarette');

            $saving_now = $price_day  * $elapse_days->days - $number_cig_smoked * $price_cig;
            $pourcentage = $saving_now / $project['price'] * 100 ;
            $final = ($project['price'] - $saving_now);
            $project->save();
        

        return response()->json(['users' => $users, "saving_now"=>$saving_now, "final"=>$final, 'pourcentage'=>$pourcentage, "elapse_days"=>$elapse_days]);
    }
    
}
}

