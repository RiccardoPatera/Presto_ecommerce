<form wire:submit.prevent="become_revisor" class="shadow p-5 my-2 bg-light">

    <div class="col-12">
        @if(session('message'))
            <p class="alert alert-success text-center ">{{__('ui.thankYou')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">{{__('ui.name')}}</label>
        <input type="text" class="form-control shadow @error('name') is-invalid @enderror" id="name" wire:model.lazy="name" aria-describedby="NameHelp">
    </div>

<<<<<<< HEAD
        @error('name')
        <p class="text-danger">{{__('ui.reqName')}}</p>
        @enderror
=======
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
>>>>>>> 23cfc855794da3e9be7e7d4b1c33fa7194d9c6d3

    <div class="mb-3">
        <label for="surname" class="form-label">{{__('ui.surname')}}</label>
        <input type="text" step="0.01" class="form-control shadow @error('surname') is-invalid @enderror" id="surname" wire:model="surname" aria-describedby="SurnameHelp">
    </div>

<<<<<<< HEAD
        @error('surname')
        <p class="text-danger">{{__('ui.reqSurname')}}</p>
        @enderror


        <div class="mb-3">
            <label for="body" class="form-label">{{__('ui.applyJob')}}</label>
            <textarea name="body" id="body" wire:model.lazy="body" cols="30" rows="10" class="form-control"></textarea>
        </div>
        @error('body')
        <p class="text-danger">{{__('ui.reqDesc')}}</p>
        @enderror
=======
    @error('surname')
    <p class="text-danger">{{$message}}</p>
    @enderror


    <div class="mb-3">
        <label for="body" class="form-label">{{__('ui.applyJob')}}</label>
        <textarea name="body" id="body" wire:model.lazy="body" cols="30" rows="10" class="form-control shadow @error('body') is-invalid @enderror"></textarea>
    </div>
    @error('body')
    <p class="text-danger">{{$message}}</p>
    @enderror
>>>>>>> 23cfc855794da3e9be7e7d4b1c33fa7194d9c6d3


    {{-- <div class="mb-3">
        <label for="file" class="form-label">Curriculum</label>
        <input type="file"  class="form-control shadow" id="file" wire:model="file" aria-describedby="fileHelp">
    </div>
    @error('file')
    <p class="text-danger">{{$message}}</p>
    @enderror --}}

    <button type="submit" class="btn btn-submit my-4">{{__('ui.submit')}}</button>
    
</form>
