@extends("layout")
@section("body")
    @foreach($posts as $post)
    <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-image">
          <img src="{{asset($post->path)}}">
          <span class="card-title">{{$post->title}}</span>
        </div>
        <div class="card-content">
          <p>{{str_limit($post->body, 200)}}</p>
        </div>
        <div class="card-action">

          <a href="/post/{{$post->id}}" style="padding-left:650px">Читать дальше</a>
        </div>
      </div>
    </div>
  </div>
    @endforeach
@endsection
@section("links")
    @foreach($links as $link)
        <li><a href="/posts/{{$link->id}}">{{$link->name}}</a></li>
    @endforeach
    <li><a href="/admin">Добавить свой рецепт</a></li>
@endsection 
@section("pagination")  
 <center>
     <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
 </center>
@endsection