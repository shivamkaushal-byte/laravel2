<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;

use App\tag;

use App\category;

class blogpostController extends Controller
{
  public function show(post $post){
    return view('blog.show')->with('post',$post);
  }
    //
  public function category(category $category){
    $post = $category->post();
    $search = request()->query('search');
    if($search){
      $posts = $category->post()->where('title','LIKE',"%$search%")->simplepaginate(3);
    }else {
      $posts = $category->post()->simplepaginate(3);
    }

    return view('blog.category')->with('category',$category)->with('posts', $posts)->with('categories',category::all());
  }
  public function tag(tag $tag){
    return view('blog.tag')->with('tag',$tag)->with('posts',$tag->post()->simplepaginate(3))->with('tags',tag::all())->with('categories',category::all());
  }
}
