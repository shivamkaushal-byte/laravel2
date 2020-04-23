@extends('layouts.app')

@section('content')

<div class="card card-default">

  <div class="card-header"> Edit tag</div>

  <div class="card-body">

    @if($errors->any())
    <div class="alert alert-danger">
      <ul class="list-groups">
        @foreach($errors->all() as $error)

        <li class="list-group-item text-danger">
          {{$error}}
        </li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="{{ route('tag.update',$tag->id) }}" method="POST">

      @csrf
      @method('PUT')
      <div class="form-group">
        <lable for="name">Name</label>

          <input type="text" id="name" class="form-control" name="name" value="{{$tag->name}}">

        </div>

        <div class="form-group">

          <button class="btn btn-sucess">UPDATE</button>

        </div>
      </form>
    </div>

</div>


@endsection
