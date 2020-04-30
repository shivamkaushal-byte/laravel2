<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;

use App\tag;

class blogpostController extends Controller
{
  public function show(post $post){
    return view('blog.show')->with('post',$post);
  }
    //
}
