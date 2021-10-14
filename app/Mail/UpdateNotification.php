<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DataToSend;

class UpdateNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $data_to_send;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data_to_send)
    {
        $this->data_to_send = $data_to_send;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.update_notification');
    }
}
