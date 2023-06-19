<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 pt-5">
                <h1 class="text-center pb-5 text-white">{{__('ui.sell')}}</h1>
                @if (session('edit'))
                    <h3 class="text-center alert alert-warning">{{session('edit')}}</h3>
                @endif

                @livewire('edit-article', compact('article'))
            </div>
        </div>
    </div>

</x-layout>

