<?php

namespace App\Http\Controllers;

use App\Models\Cracking;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Doctrine\DateTimeType;
use DateTime;
use DateTimeImmutable;
use Faker\Core\DateTime as CoreDateTime;
use Faker\Provider\cs_CZ\DateTime as Cs_CZDateTime;
use Faker\Provider\DateTime as ProviderDateTime;
use Faker\Provider\zh_TW\DateTime as Zh_TWDateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getStats()
    {
        $user_id = Auth::user()->id;

        // Le projet de l'utilisateur
        $project = Project::where("user_id", $user_id)->firstOrFail();
        $cigarettes_per_day = $project->numbersmoke;
        $pack_price = $project->pricepack;
        $date_created = $project->created_at;

        // Les craquages de l'utilisateur
        $crakings = Cracking::where("project_id", $project->id)->get();

        // Date du jour
        $current_date = Carbon::now();
         
    

        // Calculs
        $elapse_days =  $current_date->diffInDays( Carbon::parse($date_created));
        $not_smoked_cigarettes_expectation = $cigarettes_per_day * $elapse_days;
        $smoked_cigarettes = 0;

        if (count($crakings) > 0) {
            foreach ($crakings as $craking) {
                $smoked_cigarettes += $craking->numbercigarette;
            }
        }

        $saved = ($pack_price / 20) * ($not_smoked_cigarettes_expectation - $smoked_cigarettes);
return response()->json();
     
    }
}
