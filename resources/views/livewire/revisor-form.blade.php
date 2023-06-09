<form wire:submit.prevent="become_revisor" class="shadow p-5 my-2">
    <div class="col-12">
        @if(session('message'))
            <p class="alert alert-success text-center ">{{session('message')}}</p>
        @endif
    </div>

        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" wire:model.lazy="Name" aria-describedby="NameHelp">
        </div>

        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="Surname" class="form-label">Surname</label>
            <input type="text" step="0.01" class="form-control" id="Surname" wire:model="Surname" aria-describedby="SurnameHelp">
        </div>

        @error('surname')
        <p class="text-danger">{{$message}}</p>
        @enderror


        <div class="mb-3">
            <label for="body" class="form-label">Why you're apply to this job</label>
            <textarea name="body" id="body" wire:model.lazy="body" cols="30" rows="10" class="form-control"></textarea>
        </div>
        @error('body')
        <p class="text-danger">{{$message}}</p>
        @enderror


        <div class="mb-3">
            <label for="file" class="form-label">Curriculum</label>
            <input type="file"  class="form-control" id="file" wire:model="file" aria-describedby="fileHelp">
        </div>
        @error('img')
        <p class="text-danger">{{$message}}</p>
        @enderror




        <button type="submit" class="btn btn-outline-dark my-4">Submit</button>
</form>
