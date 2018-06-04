<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Route::get('/', function () {
    $results = App\Category::all();
    return view('welcome', ["links"=>$results]);
});
Route::get('/posts/{num}', function($num){
    $results = App\Category::all();
    $results2 = App\Post::where('category_id', $num)->get();
    return view('posts', ["posts"=>$results2, "links"=>$results]);
});
Route::get('/post/{id}', function($id){
    $post = App\Post::find($id);
    $comments = App\Post::find($id)->comments;
    $links = App\Category::all();
    return view('post', ["post"=>$post, "links"=>$links, "comments"=>$comments]);
});
Route::get('/admin', function(){
    return view('admin');
});
Route::post('/addPost',function(Request $req){
    $path = Storage::put('public', $req->file('post_image'));
    $url = Storage::url($path);
    echo $path;
  App\Post::create([
        "title"=>$req->post_title,
        "body"=>$req->post_body,
        "category_id"=>1,
        "path"=>$url,
    "likes"=>0
    ]);
});
Route::get('/ajax', function(Request $req){
    header("Access-Control-Allow-Origin: *");
    $post = App\Post::create([
        "category_id"=>$req->id,
        "title"=>$req->title,
        "body"=>$req->text,
        "path"=>"ekek",
          
    ]);
});
Route::get('/getAll',function(Request $req){
    header('Access-Control-Allow-Origin: *');
    $category = App\Item::all();
    return $category;
});
Route::get('/lost', function(Request $req){
     header('Access-Control-Allow-Origin: *');
     $lostItems = DB::table('items')->where('status', '=', 0)->get();
     return $lostItems;
});
Route::get('/found', function(Request $req){
     header('Access-Control-Allow-Origin: *');
     $foundItems = DB::table('items')->where('status', '=', 1)->get();
     return $foundItems;
});
Route::post('/addComment/{id}', function(Request $req, $id){
     App\Comment::create([
        "user_name"=>$req->user_name,
        "body"=>$req->comment_body,
        "post_id"=>$id,
    ]);
    return back();
});
Route::get('/addLike/{id}', function(Request $req, $id){
    $post = App\Post::find($id);
    $likes = $post->likes+1;
    App\Post::find($id)->update(["likes"=>$likes]);
    return back();
});

