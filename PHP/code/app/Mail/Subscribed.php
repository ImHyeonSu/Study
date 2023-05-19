<?php

namespace App\Mail;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Subscribed extends Mailable implements ShouldQueue
{   #説明ーphp artisan make:mail Subscribed
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public readonly User $user,
        public readonly Blog $blog
    ) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    #送った人、もらった人、メール件名などの情報
    {
        return new Envelope(
            subject: 'subscirber アラム',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {#メールの内容　- 419参考
        return new Content(
            view: 'emails.subscribed',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {#添付するファイル指定可能
        return [];
    }
}
