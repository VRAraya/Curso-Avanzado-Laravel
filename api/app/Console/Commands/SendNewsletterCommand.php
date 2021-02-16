<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Notifications\NewsletterNotification;

class SendNewsletterCommand extends Command
{
    protected $signature = 'send:newsletter
                            {emails?*} : Emails to send directly
                            {--s|schedule : Whether it should be executed directly or not}';

    protected $description = 'Send an email';

    public function handle()
    {
        $emails = $this->argument('emails');
        $schedule = $this->option('schedule');

        $builder = User::query();

        if($emails) {
            $builder->whereIn('email', $emails);
        }

        $builder->whereNotNull('email_verified_at');
        $count = $builder->count();
        
        if($count) {
            $this->info("Will be sent {$count} mails");

            if($this->confirm('Are you sure?') || $schedule) {
                $this->output->progressStart($count);
                $builder->each(function (User $user) {
                    $user->notify(new NewsletterNotification());
                    $this->output->progressAdvance();
                });
                $this->output->progressFinish();
                $this->info("\n{$count} mails were sent");
                return;
            }
        }
        $this->info('No mails was sent');
    }
}
