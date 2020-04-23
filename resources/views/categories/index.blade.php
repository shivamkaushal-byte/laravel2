@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">

  <a href="{{route('categories.create')}}" class="btn btn-sucess">Add category</a>

</div>



<div class="card card-default">

  <div class="card-header">categories</div>

  <div class="card-body">

    <table class="table">

      <thread>

        <th>Name</th>
        <th>post count</th>

      <tbody>

        @foreach($categories as $category)

           <tr>

             <td>
               {{ $category->name }}
            </td>
            <td>
              {{ $category->post->count() }}
            <td>
            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary">Edit</a>
          </td>
          <td>
            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
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
