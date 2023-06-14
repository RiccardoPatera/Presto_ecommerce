<form wire:submit.prevent="become_revisor" class="shadow p-5 my-2 bg-light">
    <div class="col-12">
        @if(session('message'))
            <p class="alert alert-success text-center ">{{__('ui.thankYou')}}</p>
        @endif
    </div>

        <div class="mb-3">
            <label for="name" class="form-label">{{__('ui.name')}}</label>
            <input type="text" class="form-control" id="name" wire:model.lazy="name" aria-describedby="NameHelp">
        </div>

        @error('name')
        <p class="text-danger">{{__('ui.reqName')}}</p>
        @enderror

        <div class="mb-3">
            <label for="surname" class="form-label">{{__('ui.surname')}}</label>
            <input type="text" step="0.01" class="form-control" id="surname" wire:model="surname" aria-describedby="SurnameHelp">
        </div>

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


        {{-- <div class="mb-3">
            <label for="file" class="form-label">Curriculum</label>
            <input type="file"  class="form-control" id="file" wire:model="file" aria-describedby="fileHelp">
        </div>
        @error('file')
        <p class="text-danger">{{$message}}</p>
        @enderror --}}




        <button type="submit" class="btn btn-outline-dark my-4">{{__('ui.submit')}}</button>
</form>
