@if($article->tips!=null)
    <div class="col-12 alert alert-danger">
        <h4 class="text-center">{{__('ui.tipRev')}}: {{$article->tips}}</h4>
    </div>
@endif

<form wire:submit.prevent="edit" class="shadowcard rounded p-5 my-2 bg-light">

    <div class="col-12">
        @if(session('message'))
            <p class="alert alert-success text-center">{{session('message')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">{{__('ui.titleItem')}}</label>
        <input type="text" value="{{$title}}" class="form-control shadow @error('title') is-invalid @enderror" id="title" wire:model="title" aria-describedby="titleHelp" >
    </div>

    @error('title')
    <p class="text-danger">{{$message}}</p>
    @enderror


    <div class="mb-3">
        <label for="price" class="form-label">{{__('ui.price')}}</label>
        <input type="number" step="0.01" value="{{$price}}" class="form-control shadow @error('price') is-invalid @enderror" id="price" wire:model="price" aria-describedby="priceHelp">
    </div>

    @error('price')
    <p class="text-danger">{{$message}}</p>
    @enderror


    <div class="mb-3">
        <label for="body" class="form-label">{{__('ui.desc')}}</label>
        <textarea name="body" id="body" wire:model="body" cols="30" rows="10" class="form-control shadow @error('body') is-invalid @enderror">{{$body}}</textarea>
    </div>
    @error('body')
    <p class="text-danger">{{$message}}</p>
    @enderror


    {{-- categoria --}}

    <div class="mb-3 my-3">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header " id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{__('ui.cat')}}
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse  collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach ($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio"  name='flexRadioDisabled'  value="{{$category->id}}" id={{$category->category}} wire:model.lazy="category_id" {{$category->id==$article->category_id ? "checked": ''}}>
                                <label class="form-check-label" for="{{$category->category}}">
                                    {{$category->category}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @error('category_id')
        <p class="text-danger">{{$message}}</p>
    @enderror

    {{-- <div x-data="{ buttonDisabled: false }">
        <button @click="$wire.edit; buttonDisabled = true"
            :disabled="buttonDisabled">Save</button>
    </div> --}}
    <button type="submit"  class="btn btn-submit shadow my-4">
        {{__('ui.submit')}}
    </button>

</form>
