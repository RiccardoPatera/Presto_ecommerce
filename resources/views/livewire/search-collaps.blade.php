<div class="container cont-collapse">
    <div class="row">
        <div class="col-12 d-flex p-0">
            {{-- lato sx --}}
            <div class="col-6">
                <img src="https://picsum.photos/400" class="img-fluid img-custom p-0" alt="">
            </div>
            {{-- lato dx --}}
            <div class="col-3 mt-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        <p>Category all</p>
                    </label>
                </div>
                @foreach ($categories->take(5) as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        <p>{{$category->category}}</p>
                    </label>
                </div>
                @endforeach
                <div class="mt-3 d-flex">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name='search'  wire:model="search">
                    <button class="btn btn-outline-light ms-3" type="submit" wire:click="searched"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
            <div class="col-3 mt-5">
                @foreach ($categories->reverse()->take(5) as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        <p>{{$category->category}}</p>
                    </label>
                </div>
                @endforeach      
            </div>
        </div>
    </div>
</div>