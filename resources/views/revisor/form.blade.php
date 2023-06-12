<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            @if(!Auth::user()->is_revisor)
            <div class="col-12 col-md-8 pt-5">
                <h1 class="text-center pb-5">Work with us</h1>
                <p class="text-center">Tell us why you want work with PRESTO</p>
                <livewire:revisor-form>
            </div>
            @else
                <div class="col-12 d-flex justify-content-center align-items-center flex-column vh-50">
                    <div class="notify">
                        <h4 class=" text-center "> You're already a revisor</h4>
                        <h4>Press to view your Reviewing Zone</h4>
                    </div>
                    <a href="{{route('revisor_index')}}" class=" btn btn-custom mt-3 ">Go!</a>
                </div>
            @endif
        </div>
    </div>
</x-layout>
