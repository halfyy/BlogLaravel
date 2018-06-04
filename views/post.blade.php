@extends("layout")
@section("links")
    @foreach($links as $link)
        <li><a href="/posts/{{$link->id}}">{{$link->name}}</a></li>
    @endforeach
    <li><a href="/admin">Добавить свой рецепт</a></li>
@endsection 
@section("post_title")
  <h1 style="padding-left:20px">{{$post->title}}</h1>
@endsection

@section("post_body")
  <center>
      <img src="{{asset($post->path)}}" alt="">
  <p style="padding-left:20px">{{$post->body}}</p>
  <p style="padding-left:800px">{{$post->created_at->diffForHumans()}}</p>
  </center>
  <a class="waves-effect waves-light btn" href="/addLike/{{$post->id}}"><i class="material-icons right">favorite_border</i>{{$post->likes}}</a>
@endsection

@section("body")

  @foreach($comments as $comment)
    <ul class="collection">
    <li class="collection-item avatar">
      <img src="../../public/img/avatar.jpeg" alt="" class="circle">
      <span class="title">{{$comment->user_name}}</span>
      <p>{{$comment->body}}</p>
      
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
  </ul>

           
        
  @endforeach
  

  <form action="/addComment/{{$post->id}}" method="post">
      @csrf
      <input type="text" name="user_name">
      <input type="text" name="comment_body">
      <button type="submit" class="btn">Send</button>
  </form>

@endsection
