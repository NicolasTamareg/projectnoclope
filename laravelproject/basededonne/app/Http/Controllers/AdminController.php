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

    public function getFullUsers()
    {
        $listusers = User::all();


        return response()->json(['message' => 'User all liste.', 'user' => $listusers], 200);
    }
    public function getFullUsersProject()
    {

        $users = DB::table('users')->join('projects', 'users.id', '=', 'projects.user_id')->get();
        

        return response()->json(['message' => 'User Project check', 'userproject' => $users], 200);
    }
    public function getStats()
    {
     
    $user_id = User::all();
          return redirect()->action(
            [DashboardController::class, 'getStats'], ['user_id' => $user_id]
        );
    } 

    public function getProject($id){

        // recupere un project relier a un ID

        $project=Project::findOrFail($id);

        return response()->json(['message'=>'User Project check','adminproject'=>$project],200);

    }

}

