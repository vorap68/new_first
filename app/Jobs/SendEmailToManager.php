<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class SendEmailToManager implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

       
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('dmkaspar68@gmail.com')->send(new OrderMail($this->param_request,$this->name));
    }
}
