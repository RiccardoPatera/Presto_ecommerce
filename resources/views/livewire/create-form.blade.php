 <form wire:submit.prevent="create">
        <div class="mb-3">
            <label for="title" class="form-label">Title item</label>
            <input type="text" class="form-control" id="title" wire:model="title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" wire:model="price" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Description</label>
            <textarea name="body" id="body" wire:model="body" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="mb-3">
           <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Accordion Item #1
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @foreach ($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$category->id}}" wire:model="category_id" id="{{$category->category}}">
                            <label class="form-check-label" for="{{$category->category}}">
                                {{$category->category}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary my-4">Submit</button>
</form>
