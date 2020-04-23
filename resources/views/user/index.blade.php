@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">


</div>



<div class="card card-default">

  <div class="card-header">users</div>

  <div class="card-body">

    <table class="table">

      <thread>

        <th>Name</th>
        <th>ROLE</th>
        <th>email</th>

      <tbody>

        @foreach($users as $user)

           <tr>

             <td>
               {{ $user->name }}
            </td>
            <td>
              {{ $user->role  }}
            </td>
            <td>
              {{ $user->email }}
            </td>
            @if(!$user->isAdmin())
            <td>
            <form action="{{ route('makeadmin', $user->id) }}" method="POST">

              @csrf
              <button class="btn btn-sucess">make admin</button>
        </form>
        </td>
        @endif
          </tr>
          @endforeach
        </tbody>
      </table>

</div>
@endsection
