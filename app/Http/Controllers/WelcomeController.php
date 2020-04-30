<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;
use App\post;
use App\tag;

class WelcomeController extends Controller
{
 public function index(){
   $search = request()->query('search');
   if($search){
     $posts = post::where('title','LIKE',"%$search%")->simplepaginate(2);
   }else {
     $posts = post::simplepaginate(2);
   }
   return view('welcome')
   ->with('categories',category::all())
   ->with('posts',$posts)
   ->with('tags',tag::all());
 }

    //
}
