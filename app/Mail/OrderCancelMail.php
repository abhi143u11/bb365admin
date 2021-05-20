<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCancelMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $bills;
    public $billproducts;
    public $transaction;
    
    public function __construct($bills, $billproducts,$transaction)
    {
        $this->bills = $bills;
        $this->billproducts = $billproducts;
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
  
    public function build()
    { 
    return $this->view('email.order-cancel')
    ->subject("Order Has Been Cancel By ".$this->bills->name." for Order No ".$this->bills->id);
     
    }
}
