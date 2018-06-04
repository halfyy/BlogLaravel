<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["body", "title", "category_id", "path","likes"];
    public function comments(){
        return $this->hasMany('App\Comment');
        
    }
}
