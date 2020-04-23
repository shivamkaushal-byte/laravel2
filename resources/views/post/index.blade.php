@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">

  <a href="{{route('post.create')}}" class="btn btn-sucess">Add post</a>

</div>



<div class="card card-default">

  <div class="card-header">POSTS</div>
  <div class="card-body">

    <table class="table">

      <thread>

        <th>image</th>
        <th>category</th>
        <th>Title</th>

      <tbody>

        @foreach($post as $posts)

           <tr>

             <td>
            <img src="{{ $posts->image }}" width="60px" height="60px">
            </td>
            <td>
              <a href="{{ route('categories.edit',$posts->category->id) }}">
                  {{ $posts->category->name }}
            </a>
          </td>
              {{ $posts->title }}
            </td>
            <td>
           <a href="{{ route('post.show',$posts->id) }}" class="btn btn-primary">View</a>
         </td>
       </tr>
        @endforeach
@endsection
