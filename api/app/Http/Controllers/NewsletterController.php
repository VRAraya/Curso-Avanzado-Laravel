<?php

namespace App\Http\Controllers;

use App\Console\Commands\SendEmailVerificationReminderCommand;
use App\Console\Commands\SendNewsletterCommand;
use Illuminate\Support\Facades\Artisan;

class NewsletterController extends Controller
{
    public function sendNewsletter()
    {
        Artisan::call(SendNewsletterCommand::class);

        return response()->json([
            'data' => 'Emails sent'
        ]);
    }

    public function sendEmailVerificationReminder()
    {
        Artisan::call(SendEmailVerificationReminderCommand::class);

        return response()->json([
            'data' => 'Emails sent'
        ]);
    }
}
