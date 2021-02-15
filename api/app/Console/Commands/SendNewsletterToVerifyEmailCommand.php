<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use Carbon\Carbon;
use App\Notifications\NewsletterNotification;

class SendNewsletterToVerifyEmailCommand extends Command
{
    protected $signature = 'send:newsletterToVerifyEmail {emails?*}';
    protected $description = 'Send an email to users who have not checked their email within a week';

    public function handle()
    {
        $builder = User::query()
            ->whereNull('email_verified_at')
            ->whereDate('created_at', '<=', Carbon::now()->subDays(7)->format('Y-m-d'));

        $count = $builder->count();

        if($count) {
            $this->output->progressStart($count);

            $builder
                ->each(function (User $user) {
                    // $user->notify(new NewsletterNotification());
                    $user->sendEmailVerificationNotification();
                    $this->output->progressAdvance();
                });

            $this->info("\n{$count} mails were sent");
            $this->output->progressFinish();
        } else {
            $this->info('No mails was sent');
        }
    }
}
