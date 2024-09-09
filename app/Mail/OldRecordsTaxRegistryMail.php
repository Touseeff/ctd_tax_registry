<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OldRecordsTaxRegistryMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $userName;
    public $record;
    public $email;
    public $phone_number;
    public $check_box;

    public function __construct($userName, $record,$email,$phone_number,$check_box)
    {
        $this->userName = $userName;
        $this->record = $record;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->check_box = $check_box;

    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Old Records Tax Registry Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail', // Make sure this view exists in resources/views
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
