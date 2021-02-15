<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Notifications\NewsletterNotification;

class SendNewsletterCommand extends Command
{
    protected $signature = 'send:newsletter {emails?*}';
    protected $description = 'Send an email';

    public function handle()
    {
        $emails = $this->argument('emails');
        $builder = User::query();

        if($emails) {
            $builder->whereIn('email', $emails);
        }

        $count = $builder->count();
        
        if($count) {
            $this->output->progressStart($count);

            $builder
                ->whereNotNull('email_verified_at')
                ->each(function (User $user) {
                    $user->notify(new NewsletterNotification());
                    $this->output->progressAdvance();
                });

            $this->info("\n{$count} mails were sent");
            $this->output->progressFinish();
        } else {
            $this->info('No mails was sent');
        }

    }
}
