<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewTripEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @return void
     * lo de arriba no se si vaaaaaaaa
     */

    private $id;
    private $name;
    private $subjectCustom;
    public function __construct($name, $id, $subjectCustom)
    {
        $this->name = $name;
        $this->id = $id;
        $this->subject = $subjectCustom;
    }

    public function build()
    {
        return $this->markdown('emails.mail-new-account')
        ->with([
            'name' => $this->name,
            'id' => $this->id,
            'content' => 'Email recibido desde UniRuta'
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectCustom,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
