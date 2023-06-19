<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UserImg extends Component
{
    use WithFileUploads;
    public $user;
    public $img;

    protected $rules = [
        'img'=> 'image',
    ];

    protected $messages = [
        'img.image'=> 'The file need to be an image',
    ];


    public function user_img_upload() {
        $this->validate();
        Storage::deleteDirectory('public/user/'. $this->user->id );
        $this->user->update([
            'img'=>$this->img->store('public/user/'. $this->user->id),
        ]);
        File::deleteDirectory(storage_path('/app/livewire-tmp'));

    }
    public function render()
    {
        return view('livewire.user-img');
    }
}
