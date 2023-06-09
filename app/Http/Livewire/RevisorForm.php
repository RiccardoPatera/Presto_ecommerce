<?php

namespace App\Http\Livewire;

use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class RevisorForm extends Component
{

    use WithFileUploads;

    public $name;
    public $surname;
    public $body;
    // public $file;

    protected $rules = [
        'name' => 'required|min:5',
        'surname' => 'required|doesnt_start_with:-',
        'body' => 'required|min:5',
        'file'=> 'required',
    ];

    protected $messages = [
        'name.required'=> 'The name is required',
        'surname.required'=> 'The surname is required',
        'body.required'=> 'The description is required',
        'file.required'=> "The curriculum is required"
        // 'file.mimetypes:application'=> "The curriculum is required",

    ];

   public function become_revisor(){
        $this->validate();
        $data=compact($this->name, $this->surname,$this->body);
        Mail::to('admin@presto.it')->send(new BecomeRevisor($data));


    session()->flash('message','Thank you! Your candidature is under review');
    $this->reset();

    }



    public function render()
    {
        return view('livewire.revisor-form');
    }
}
