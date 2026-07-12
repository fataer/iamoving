<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\InformeDetalladoCabecera;
use App\Alerta;
use App\User;
use App\Mail\NewsNotificationMail;

class NotifyNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iamoving:notify_news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifica diariamente sobre nuevos inmuebles a usuarios suscritos';

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
        $date = date('Y-m-d');
        $pastDate = date( "Y-m-d", strtotime($date . "-1 day"));
        echo "Imuebles desde:" . $pastDate ."\n";
        $inmuebles = InformeDetalladoCabecera::where('created_at','>=',$pastDate)->where('published',true)->get();
        if($inmuebles->count() > 0){
            $user_alertas = Alerta::where('descripcion1','Alerta todo Iamoving')->pluck('user_id');
            
            $emails = User::whereIn('id',$user_alertas)->pluck('email');
            
            foreach($emails as $email){
                \Mail::to($email)->send(new NewsNotificationMail($inmuebles));
            }
        }
    }
}
