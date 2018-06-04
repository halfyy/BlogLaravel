@extends("layout")
@section("body")
<h1>Главная страница</h1>
@endsection
@section("links")
   @foreach($links as $link)
     <li>
     <a href="/posts/{{$link->id}}">
     {{$link->name}}
     </a>
     </li>
   @endforeach
@endsection