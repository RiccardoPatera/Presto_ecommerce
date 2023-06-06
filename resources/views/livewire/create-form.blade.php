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
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
