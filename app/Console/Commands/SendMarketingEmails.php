<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Mail;

class SendMarketingEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-marketing {view} {subject}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send marketing emails to users';

    /**
     * Execute the console command.
     * @throws BindingResolutionException
     */
    public function handle(): void
    {
        $view = $this->argument('view');
        $subject = $this->argument('subject');

        $users = User::where('is_developer', 0)
            ->whereNull('deleted_at')
            ->get();

        if ($users->isEmpty()) {
            $this->info('No users found to send emails.');
            return;
        }

        foreach ($users as $user) {
            Mail::send($view, ['user' => $user, 'url' => app()->make('url')->to('/')], function ($message) use ($user, $subject) {
                $message->to($user->email, $user->name)
                    ->subject($subject);
            });
        }

        $this->info('Emails sent successfully to ' . count($users) . ' users.');
    }
}
