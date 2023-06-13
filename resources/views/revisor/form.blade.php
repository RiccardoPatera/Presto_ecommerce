<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            @if(!Auth::user()->is_revisor)
            <div class="col-12 col-md-8 pt-5">
                <h1 class="text-center pb-5 text-white">{{__('ui.work')}}</h1>
                <p class="text-center text-white">{{__('ui.tellUs')}}</p>
                <livewire:revisor-form>
            </div>
            @else
                <div class="col-12 d-flex justify-content-center align-items-center flex-column vh-50">
                    <div class="notify">
                        <h4 class=" text-center "> {{__('ui.alRev')}}</h4>
                        <h4>{{__('ui.viewRev')}}</h4>
                    </div>
                    <a href="{{route('revisor_index')}}" class="btn btn-custom mt-3 d-flex align-items-center justify-content-center">
                        <h5 >{{__('ui.go')}}</h5>
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layout>
