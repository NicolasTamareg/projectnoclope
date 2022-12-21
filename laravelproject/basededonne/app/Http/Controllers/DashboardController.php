<?php

namespace App\Http\Controllers;

use App\Models\Cracking;
use App\Models\Project;
use DateTime;
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
        $user_id = auth()->id();

        // Le projet de l'utilisateur
        $project = Project::where("user_id", $user_id)->firstOrFail();
        $cigarettes_per_day = $project->numbersmoke;
        $pack_price = $project->pricepack;
        $date_created = $project->created_at;
        $price_project = $project->price;

        // Les craquages de l'utilisateur
        $crakings = Cracking::where("project_id", $project->id)->get();

        // Date du jour
        $current_date = Date::now();



        // Calculs
        $elapse_days =  $current_date->diff(new DateTime($date_created));
        $not_smoked_cigarettes_expectation = $cigarettes_per_day * $elapse_days->days;
        $smoked_cigarettes = 0;

        if (count($crakings) > 0) {
            foreach ($crakings as $craking) {
                $smoked_cigarettes += $craking->numbercigarette;
            }
        }
        
        $saved = ($pack_price / 20) * ($not_smoked_cigarettes_expectation - $smoked_cigarettes);
    if ($saved < 0) {
            $saved = 0;
        }
        $final = ($price_project - $saved);
        $pourcentage = $saved  / $price_project * 100;
        return response()->json(['pourcentage' => $pourcentage, 'final' => $final, 'saved' => $saved, 'price_project' => $price_project, 'project' => $project, "cigarettes_per_day" => $cigarettes_per_day, 'date_created' => $date_created, 'crakings' => $crakings, 'current_date' => $current_date, 'not_smoked_cigarettes_expectation' => $not_smoked_cigarettes_expectation, 'smoked_cigarettes' => $smoked_cigarettes, 'elapse_days' => $elapse_days]);
    }
}

