<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped2 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $fromsss;

    public function __construct($from)
    {
        $this->fromsss = $from;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->fromsss['email'])
            ->subject('Suggest New Plant from user [ '.$this->fromsss['name'].']')
            ->markdown('emails.orders.shipped')
            ->with([
                'text' => $this->fromsss['text'],
            ]);
    }

}
