@extends('layouts.AdminPanel')

@section('content')

<div class="content-wrapper">
<section class="content container-fluid">
                              @if (session('status'))
                                     {{  session('status') }}  
                            @endif
                            
                            @if (session('msg'))
                                     {{  session('msg') }}  
                            @endif
  <h2>Basic Table</h2>
  @if(Auth::user()->id == 1)
  <a href="add-member"><div class="btn btn-success"> Add new member </div></a>
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Email</th>
        <th>Roles</th> 
        <th>Action</th> 
      </tr>
    </thead>
        <tbody>
        @foreach($AllUsers as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                
                @foreach( $user->roles as $role)
                <div class="text-info">{{ $role->name }}  </div>
                @endforeach
            </td>
            <td> 
            <form method="POST" action="remove-member/{{$user->id}}" >
            @csrf
                <button type="submit" class="btn btn-danger">delete </button>
          </form>
              <a href="edit-member/{{$user->id}}">
                <div class="btn btn-info">edit</div>
              </a>
              </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      
      </section>
    </div>
@endif
@endsection
