@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                  <form action="{{ route('user.update') }}" action ="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="name">name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                  </div>
                 <div class="form-group">
                   <label for="email">email</label>
                   <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
            </div>
              <div class="form-group">
                <button class="btn btn-sucess">UPDATE</button>
           </div>

        </div>
    </div>
</div>
@endsection
