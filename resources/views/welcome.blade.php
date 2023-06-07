<x-layout>
    <div class="container-fluid">
        <div class="row ">
            @foreach ($articles as $article)
            <div class="col-12 col-md-6 d-flex justify-content-center">
                    @livewire('item-card', compact('article'))
            </div>
            @endforeach
        </div>
    </div>   
</x-layout>