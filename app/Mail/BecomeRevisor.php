<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializeModels;

class BecomeRevisor extends Mailable 
{
    use Queueable, SerializeModels;


    public $user;
    public function __construct (User $user){
        $this->user = $user;
    }

    public function build(){
        return $this->from ('presto.it@noreply.com')->view('mail.become_revisor');
    }
}