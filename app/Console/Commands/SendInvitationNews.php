<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Mail\DailyNotificationMail;

class SendInvitationNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iamoving:send_invitation_news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia un email para invitar a los usuarios a recibir notificaciones diarias de inmuebles';

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
        $users = User::where('procesado',1)->where('role_id', 4)->get();
        foreach($users as $user){
            \Mail::to($user->email)->send(new DailyNotificationMail($user));
        }
    }
}
