@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">

  <a href="{{route('tag.create')}}" class="btn btn-sucess">Add tags</a>

</div>



<div class="card card-default">

  <div class="card-header">tags</div>

  <div class="card-body">

    <table class="table">

      <thread>

        <th>Name</th>
        <th>post count</th>


      <tbody>

        @foreach($tags as $tag)

           <tr>

             <td>
               {{ $tag->name }}
            </td>
            <td>
              {{ $tag->post->count() }}
            <td>
            <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-primary">Edit</a>
          </td>
          <td>
            <form action="{{ route('tag.destroy',$tag->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('are you sure to delete')" class="btn btn-Danger">DELETE</button>

      </form>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>

</div>
@endsection
