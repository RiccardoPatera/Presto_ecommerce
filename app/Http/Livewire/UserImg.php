<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UserImg extends Component
{
    use WithFileUploads;
    public $user;
    public $img;


    public function user_img_upload() {
        $this->user->update([
            'img'=>$this->img->store('public/user/'. $this->user->id . '/'),
        ]);
    }
    public function render()
    {
        return view('livewire.user-img');
    }
}
