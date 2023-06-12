<form method="GET" action="{{route('search')}}" class="d-flex" role="search">
    @csrf
    <div class="d-flex">
        <select name="category" wire:model="category" class="form-select me-2">
            <option value="0">
                All Categories
            </option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" >
                {{$category->category}}
            </option>
            @endforeach
        </select>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search'  wire:model="search" >
    </div>

  <button class="btn btn-outline-light" type="submit" wire:click="searched"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
