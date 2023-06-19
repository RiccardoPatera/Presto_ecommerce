<x-layout>
    <div class="container 100vh">
        <div class="row justify-content-center">
            @if(!Auth::user()->is_revisor)
                <div class="col-12 col-md-8 pt-5">
                    <h1 class="text-center pb-5 text-light display-1">{{__('ui.work')}}</h1>
                    <livewire:revisor-form>
                </div>
            @else
                <div class="col-12 d-flex justify-content-center align-items-center flex-column vh-100">
                    <div class="notify rounded mt-5 mb-3 text-center">
                        <img src="{{Storage::url('public/media/alredyrevisor.png')}}" class="pngstep" alt="">
                        <h4>{{__('ui.alRev')}}</h4>
                        <h4>{{__('ui.viewRev')}}</h4>
                    </div>
                    <a href="{{route('revisor_index')}}" class="btn-link"><p class="mb-0 p-2 fw-semibold fs-5">{{__('ui.go')}}</p></a>
                </div>
            @endif
        </div>
    </div>
</x-layout>
