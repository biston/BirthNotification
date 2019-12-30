<?php

namespace App\Console\Commands;

use App\Employe;
use Carbon\Carbon;
use App\Historique;
use App\Mail\HappyBirthDay;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendBirthMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail for notify the birth Day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //liste des Id des employes qui ont déjà recu la notification
        $received_employes=Historique::where('date_traitement',Carbon::today())->get()->pluck('employe_id');

        //envoyer a tous les employes saufs ceux  qui nont pas recu
        Employe::BirthdayToday()->whereNotIn('id',$received_employes)
                                ->get()
                                ->each(function($employe,$key){
                                    sleep(10);
                                    Mail::to($employe->email)->send(new HappyBirthDay($employe));

                                    $employe->historiques()->create([
                                        'employe_id'=>$employe->id,
                                        'status'=>'OK',
                                        'date_traitement'=>Carbon::now()
                                    ]);

                                }) ;



    }
}
