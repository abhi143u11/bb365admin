<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AllCustomerNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $subject;
    public $notification_message;
    public function __construct($student_data,$title,$message)
    {
        $this->student=$student_data;
        $this->subject=$title;
        $this->notification_message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.all-notification') 
        ->subject($this->subject);
    }
}
