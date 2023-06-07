<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-carousel/>
            </div>
            <div class="col-12 md-6">
                
                <h3>{{$article->title}}</h3>
                <p>{{$article->price}}</p>
                <p>{{$article->description}}</p>
                <p>{{$article->category_id}}</p>
            </div>
        </div>
    </div>
</x-layout>