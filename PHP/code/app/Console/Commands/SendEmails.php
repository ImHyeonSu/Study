<?php

namespace App\Console\Commands;

use App\Mail\Advertisement;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send
    {--Q|queue=default : The names of the queues to send emails}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send advertisement emails to users';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $queue = $this->option('queue');

        $this->sendEmails($queue);

        return 0;
    }

    /**
     * メール転送
     */
    private function sendEmails(string $queue): void
    {
        $posts = $this->posts();

        $this->users()->each(fn (User $user) => Mail::to($user)->send(
            (new Advertisement($posts))->onQueue($queue)
        ));
    }

    /**
     * メールを受け入れる使用者一覧
     */
    private function users(): Collection
    {
        return User::verified()->get();
    }

    /**
     * 書き一覧
     */
    private function posts(): Collection
    {
        return Post::latest()->limit(5)->get();
    }
}
