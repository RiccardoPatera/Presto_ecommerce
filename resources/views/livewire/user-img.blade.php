<div class="d-flex flex-column align-items-center justify-content-between">
    <img src="{{Storage::url($user->img)}}" alt="user_img" class="img-fluid user-img">
    <form  wire:submit.prevent='user_img_upload'>
    <div class="d-flex flex-column align-items-center">
        <input type="file"  wire:model='img' class ="mt-1 mb-1 ms-4">
        @error('img')
        <p class="text-danger">The File need to  be an image</p>
        @enderror
        @if(!empty($img))
            <button  type='submit' class="btn btn-outline-dark w-25"> Update</button>
        @endif
    </div>
    </form>
</div>
