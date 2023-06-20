<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $param_request;
    public $name;

    /**
     * Create a new message instance.
     * @param array param_request
     * @param string $name
     * @return void
     */
    public function __construct($param_request,$name)
    {
        $this->param_request = $param_request;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.letter')->with([
            'param_request'=> $this->param_request,
            'name' =>$this->name,
            ]);
    }
}
