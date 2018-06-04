@extends("layout")
@section("body")
  <form action="/addPost" method="post" enctype="multipart/form-data">
     @csrf
    <input type="text" name="post_title">
    <input type="text" name="post_body">
    <input type="file" name="post_image">
    <button class="btn">Новый пост</button>
  </form>
@endsection