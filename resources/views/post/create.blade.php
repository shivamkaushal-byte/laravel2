@extends('layouts.app')

@section('content')

<div class="card card-default">

  <div class="card-header"> create category</div>

  <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="form-gorup">
      <lable for="title">Title</label>

        <input type="text" id="title" class="form-control" name="title">

      </div>

    <div class="form-group">
      <label for="description">Description</label>
       <textarea  name="description" id="description" cols ="5" rows ="5" class="form-control"></textarea>
     </div>

    <div class="form-group">
      <label for="content">Content</label>
       <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
     </div>

     <div class="form-gorup">
       <lable for="published_at">published_at</label>
         <input type="text" id="published_at" class="form-control" name="published_at">
       </div>

       <div class="form-group">
         <label for="category">category</label>
         <select name="category" id="category" class="form-control">
         @foreach($category as $categories)

        <option value="{{$categories->id}}">
          {{$categories->name}}
        </option>
         @endforeach
       </select>
       <div class="form-group">
         <label for="tag">tag</label>
         <select name="tag[]" id="tag" class="form-control" multiple>
         @foreach($tag as $tags)

        <option value="{{$tags->id}}">
          {{$tags->name}}
        </option>
         @endforeach
       </select>
      


       <div class="form-gorup">
         <lable for="image">image</label>
           <input type="file" class="form-control" name="image" id="image">
         </div>

       <div class="form-group">
           <button class="btn btn-sucess">Add post</button>
         </div>
      </form>
    </div>


@endsection

@section('scripts')

 <scripts src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></scripts>

@endsection

@section('css')

 <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"

@endsection
