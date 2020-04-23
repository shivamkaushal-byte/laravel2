@extends('layouts.app')

@section('content')

<div class="card card-default">

  <div class="card-header">
   {{$post->title}}
   </div>
 </div>
   <div class="card card-body">
      <lable for="description">description</label>
        <div>
          {{$post->description}}
        </div>
      </div>
      <div class="card card-body">
        <label for="content">content</label>
        <div>
          {{$post->content}}
        </div>
      </div>
        <div class="card card-body">
          <label for="published_at">published_at</label>
          <div>
            {{$post->published_at}}
          </div>
        </div>
        <div class="form-group">
          <label for="category">category</label>
           <input type="text" id="category" class="form-control" name="category" value="{{$category[0]->name}}"></input>
         </div>

          <div class="card card-body">
            <label for="image">image</label>
            <div>
              <img src="{{ $post->image }}" width="60px" height="60px">
            </div>

      </div>
      <table>
      <tr>
        <td>
       <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary">Edit</a>
     </td>
     <td>
       <form action="{{ route('post.destroy',$post->id) }}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" onclick="return confirm('are you sure to delete')" class="btn btn-Danger">DELETE</button>
 </form>
</td>
</tr>
</table>

@endsection
