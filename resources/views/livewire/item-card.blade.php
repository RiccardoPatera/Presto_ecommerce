
<div class="card">
  <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <p class="card-text">{{$article->price}}</p>
    <p class="card-text">{{$article->category_id}}</p>
    <a href="{{route('show_article',['id'=>$article->id])}}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
