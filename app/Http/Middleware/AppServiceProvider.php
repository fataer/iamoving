// app/Providers/AppServiceProvider.php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Headers específicos para SendGrid
        Mail::macro('sendWithSendGrid', function ($mailable, $recipients) {
            return Mail::mailer('smtp')->to($recipients)->send($mailable);
        });
    }
}