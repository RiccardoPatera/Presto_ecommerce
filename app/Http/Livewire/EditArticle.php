<?php

namespace App\Http\Livewire;

<<<<<<< HEAD
use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
=======
use Livewire\Component;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
>>>>>>> de1eab99581ef1757b1c6749a4ca4a5c3e117ecb
use Illuminate\Support\Facades\File;

class EditArticle extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $body;
<<<<<<< HEAD
    public $category_id;
    public $images = [];
    public $temporary_images=[];
=======
    public $category;
    public $images = [];
    public $temporary_images;
>>>>>>> de1eab99581ef1757b1c6749a4ca4a5c3e117ecb
    public $article;
    public $validated;

    protected $rules = [
        'title' => 'required|min:5',
        'price' => 'required|doesnt_start_with:-',
        'body' => 'required|min:5',
        'category_id'=> 'required',
<<<<<<< HEAD
        // 'images'=> 'required',
        // 'images.*'=> 'required|image|max:3072',
        // 'temporary_images.*'=> 'required|image|max:3072',
    ];

    protected $messages = [
        'title.required'=> 'The title is required',
=======
        'images'=> 'required',
        'images.*'=> 'required|image|max:3072',
        'temporary_images'=> 'required|image|max:3072',
    ];

    protected $messages = [
        'title..required'=> 'The title is required',
>>>>>>> de1eab99581ef1757b1c6749a4ca4a5c3e117ecb
        'price.required'=> 'The price is required',
        'body.required'=> 'The description is required',
        'category_id.required'=> "The category is required",

        'images.*.required'=> 'The image is required',
        'images.*.max'=> 'The file need to be max 3MB',
        'images.*.image'=> 'The file need to be a image',
        'images.required'=> 'The image is required',

        'temporary_images.*.required'=> 'The image is required',
        'temporary_images.*.max'=> 'The file need to be max 3MB',
        'temporary_images.*.image'=> 'The file need to be a image',
    ];

    public function mount(){
        $this -> title = $this -> article -> title;
        $this -> price = $this -> article -> price;
        $this -> body = $this -> article -> body;
<<<<<<< HEAD
        $this -> category_id = $this -> article -> category->id;

        // foreach ($this->article->images as $image)
        // {   $this->images[]=$image;
        //     $this->temporary_images[] = $image;
        //  }
    }

    public function edit(){

        $this->validate();

        $this->article->update([
            'title' => $this -> title,
            'price' => $this -> price,
            'body' => $this -> body,
            'category_id'=>$this->category_id,
        ]);

        // if(count($this->images)){
        //     foreach ($this->images as $image) {
        //         // $this->article->images()->create(['path'=>$image->store('images', 'public')]);
        //         $newFileName="articles/{$this->article->id}";
        //         $newImage=$this->article->images()->create(['path'=>$image->store($newFileName, 'public')]);
        //         dispatch(new ResizeImage($newImage->path,500,500));
        //     }
        //     File::deleteDirectory(storage_path('/app/livewire-tmp'));
        // }

        return redirect(route('user_dashboard',['user'=> $this->article->user]))->with('message','Article updated correctly');
        session()->flash('message','Article edited successfully. Wait for the revisor to accept it.');
        $this->reset();
    }
    // public function updatedTemporaryImages(){
    //     if ($this->validate([
    //         'temporary_images.*'=>"required|image|max:3072",
    //     ])) {
    //     foreach ($this->temporary_images as $image) {
    //         $this->images[] = $image;
    //     }
    //     }
    // }

    // public function removeImage($key){
    //     if (in_array($key, array_keys($this->images))) {
    //         unset($this->images[$key]);
    //     }
    // }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
=======
        $this -> category = $this -> article -> category;

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }

    public function articleUpdate(){

        $this->validate();

        $this -> article -> update([
            'title' => $this -> title,
            'price' => $this -> price,
            'body' => $this -> body,
            'category'=>$this->category,
        ]);
        
        if(count($this->images)){
            foreach ($this->images as $image) {
                // $this->article->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName="articles/{$this->article->id}";
                $newImage=$this->article->images()->create(['path'=>$image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path,500,500));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
        return redirect(route('user_dashboard'))->with('message','Article updated correctly');
    }

    public function updated($propertyName){
        $this->validatedOnly($propertyName);
>>>>>>> de1eab99581ef1757b1c6749a4ca4a5c3e117ecb
    }

    public function render()
    {
<<<<<<< HEAD
        return view('livewire.edit-article', ['categories'=>Category::all()]);
=======
        return view('livewire.edit-article');
>>>>>>> de1eab99581ef1757b1c6749a4ca4a5c3e117ecb
    }
}
