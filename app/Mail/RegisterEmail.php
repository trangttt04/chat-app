<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $link;
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Đăng kí tài khoản',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.confirm',
            with: ['link' => $this->link]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
