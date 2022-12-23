<?php

namespace App\Console;

use App\Models\Contact;
use App\Models\Cracking;
use App\Models\Project;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // try { //Création de la transaction dans la base de données

                //Fréquence de prélèvement
                $number_day_transac=7;

                //Reccupere le craquage
                $date_day=now();
                $date_week = now()->subDay($number_day_transac); //date de 7 jours avant

                //Prelevement automatique full user
                $users = User::all();
                foreach ($users as $item) {
                    
               

                //Recupere les cigarettes fumer dans la semaine
                $iduser=$item['id'];
                $number_cig_smoked = Cracking::where('user_id', $iduser)
                    ->where('created_at', '>', $date_week)
                    ->sum('numbercigarette');

                $transaction = Operation::where('user_id', $iduser)->get();
                $project = Project::where('user_id', $iduser)->first();



                $amount = ($number_day_transac*$project['numbersmoke']*$project['pricepack'])/20 -$number_cig_smoked * ($project['pricepack'] / 20); //20 est le nombre de cigarette par paquet

                $transaction = [
                    
                    'amount' => $amount,
                    'user_id' => $iduser,
                    'project_id' => $project['id'],
                ];

                $debit =  Operation::create($transaction);

            

                    $stripe = new \Stripe\StripeClient(
                        env('STRIPE_SECRET')
                    );


                    $idconnecte = $iduser;
                    $userconnecte = User::FindOrFail($idconnecte);



                    $customer = $stripe->customers->allPaymentMethods(
                        $userconnecte['stripe_id'],
                        ['type' => 'card']
                    );


                    $payment_method = $stripe->paymentMethods->retrieve(
                        $customer['data'][0]['id'],
                        []
                    );


                    $transac = $stripe->paymentIntents->create([
                        'payment_method_types' => ['card'],
                        'amount' => $amount * 100,
                        'currency' => 'eur',
                        'customer' => $userconnecte['stripe_id'],
                        'payment_method' => $payment_method,
                    ]);

                    
                    $stripe->paymentIntents->confirm($transac->id, ['payment_method' => $payment_method]);

                }


              
        // })->weekly();
            })->everyMinute();
        // })->daily();

    
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
