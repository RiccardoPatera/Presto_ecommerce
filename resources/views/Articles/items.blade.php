<x-layout>

    
    {{-- <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <ul class="dropdown-menu">
            @foreach ($category->$articles as $article)
            <li><a class="dropdown-item" href=""></a></li>
            @endforeach
        </ul>
    </div>    --}}
    


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