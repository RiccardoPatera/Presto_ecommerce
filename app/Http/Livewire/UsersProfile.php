<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersProfile extends Component
{


    public $user;

    public function render()
    {
        return view('livewire.users-profile');
    }
}
