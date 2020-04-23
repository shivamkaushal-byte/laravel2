@extends('layouts.app')

@section('content')

<div class="card card-default">

  <div class="card-header"> Edit Post</div>

  <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="form-gorup">
      <lable for="title">Title</label>

        <input type="text" id="title" class="form-control" name="title" value="{{$post->title}}">

      </div>

    <div class="form-group">
      <label for="description">Description</label>
       <textarea  name="description" id="description" cols ="5" rows ="5" class="form-control">
{{$post->description}}
       </textarea>
     </div>

    <div class="form-group">
      <label for="content">Content</label>
       <textarea name="content" id="content" cols="5" rows="5" class="form-control">
{{$post->content}}
       </textarea>
     </div>

     <div class="form-gorup">
       <lable for="published_at">published_at</label>
         <input type="text" id="published_at" class="form-control" name="published_at" value="{{$post->published_at}}">
       </div>

       <div class="form-group">
         <label for="category">category</label>
         <select name="category" id="category" class="form-control">
         @foreach($category as $categories)

        <option value="{{$categories->id}}">
          @if($categories->id == $post->category_id)
           -
           @endif
           {{$categories->name}}
        </option>
         @endforeach
       </select>

       <div class="form-group">
         <label for="tag">tag</label>
         <select name="tag" id="tag" class="form-control">
         @foreach($tag as $tags)

        <option value="{{$tags->id}}">
          @if($post->hasTag($tags->id))
            selected
           @endif
           {{$tags->name}}
        </option>
         @endforeach
       </select>


       <div class="form-gorup">
         <lable for="image">image</label>
           <input type="file" class="form-control" name="image" id="image">
           <img src="{{ asset($post->image) }}" />
         </input>
         </div>

       <div class="form-group">
           <button class="btn btn-sucess">update post</button>
         </div>
      </form>
    </div>


@endsection
