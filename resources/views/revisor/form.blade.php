<x-layout>
    <div class="container 100vh">
        <div class="row justify-content-center">
            @if(!Auth::user()->is_revisor)
                <div class="col-12 col-md-8 pt-5">
                    <h1 class="text-center pb-5 text-white">{{__('ui.work')}}</h1>
                    <p class="text-center text-white">{{__('ui.tellUs')}}</p>
                    <livewire:revisor-form>
                </div>
            @else
                <div class="col-12 d-flex justify-content-center align-items-center flex-column vh-100">
                    <div class="notify rounded mt-5 mb-3 text-center">
                        <h4>{{__('ui.alRev')}}</h4>
                        <h4>{{__('ui.viewRev')}}</h4>
                    </div>
                    <button class="btn rounded p-2 mt-4 fs-5 fw-semibold"><a href="{{route('revisor_index')}}" class="text-decoration-none text-light">{{__('ui.go')}}</a></button>
                </div>
            @endif
        </div>
    </div>
</x-layout>
