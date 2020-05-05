<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;

use App\category;

use App\tag;

use App\Http\Middleware\VerifyCategoryCount;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('verifyCategoriesCount')->only(['create','store']);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('post.index')->with('post',post::all());
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('post.create')->with('category',category::all())->with('tag',tag::all());
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $image = $request->image->Store('post');
    $post = post::create([
        'title'=> $request->title,
        'description' => $request->description,
        'content' => $request->content,
        'published_at' => $request->published_at,
        'image'=> $image,
        'user_id' => auth()->user()->id,
        'category_id' => $request->category
          ]);
        if($post->tag){
          $post->tag()->attach($request->tag);
        }
        $post->save();
      return redirect(route('post.index'));

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = post::find($id);
      return view('post.show')->with('post',$data)->with('category',category::all());

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = post::find($id);

      return view('post.edit')->with('post',$data)->with('category',category::all())->with('tag',tag::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {

      $post->title = $request->title;
      $post->description = $request->description;
      $post->content = $request->content;
      $post->published_at = $request->published_at;
      $post->image = $request->image->Store('post');
      $post->category_id = $request->category;
      $post->user_id = $request->user_id;
      $post->tag()->attach($request->tag);
      $post->user_id = auth()->user()->id;
      $post->save();
      return redirect(route('post.index'));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = post::find($id);
      $post->delete();
      Storage::delete($post->image);
      // if($post->trashed()){
      //   $post->forcedelete();
      // }else
      // $post->delete();

      return redirect(route('post.index'));
        //
    }

    // public function trashed(){
    //   $trashed =  post::WithTrashed()->get();
    //   return redirect(route{'post.index'})->with('post',$trashed);
    // }
}
//   $category = category::with('post')->get();
//   $title = $data->title;
//   $categories = $category->all();
// //  $name = $categories->name;
//   $name = $categories[$id]->name;
