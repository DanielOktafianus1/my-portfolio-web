<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class HireMe extends Mailable
{
    use Queueable, SerializesModels;

    protected $fromEmail, $subjectText, $messageText;

    /**
     * Create a new message instance.
     */
    public function __construct($fromEmail, $subjectText, $messageText)
    {
        $this->fromEmail = $fromEmail;
        $this->subjectText = $subjectText;
        $this->messageText = $messageText;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // dd($this->fromEmail);
        return new Envelope(
            from: new Address(config('mail.from.address'), 'Web Portfolio Daniel'),
            replyTo: [new Address($this->fromEmail)],
            subject: $this->subjectText,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emailHireMe',
            with: [
                'messageText' => $this->messageText,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
