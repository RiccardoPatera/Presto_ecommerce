<x-layout>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <h1 class="text-center my-2"> Our Products </h1>
            </div>
           @livewire('view-products', compact('articles'))
        </div>
    </div>
</x-layout>
