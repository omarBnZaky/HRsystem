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
@if(Auth::user()->id == 1)
  <h2>Basic Table</h2>
  <a href="/add-employee"><div class="btn btn-success"> Add new employee </div></a>
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Email</th>
        <th>holidays</th> 
        <th>Action</th> 
        <th>Add by</th> 

      </tr>
    </thead>
    <tbody>
    @foreach($AllEmployees as $Employee)
    <tr>
        <td>{{ $Employee->name }}</td>
        <td>{{ $Employee->email }}</td>
        <td>
            @foreach( $Employee->holidays as $holiday)
             <div class="text-info">{{ $holiday->holiday }}  </div>
            @endforeach
        </td>
        <td> 
        <form method="POST" action="/remove-employee/{{$Employee->id}}" >
        @csrf
            <button type="submit" class="btn btn-danger">delete </button>
       </form>
           <a href="/edit-employee/{{$Employee->id}}">
            <div class="btn btn-info">edit</div>
           </a>
           
           <a href="/employee-attendence/{{$Employee->id}}">
            <div class="btn btn-info">attendence</div>
           </a>
          </td>
          <td>{{ $Employee->user->name }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  </section>
</div>
@else

<h2>Basic Table</h2>
  <a href="/add-employee"><div class="btn btn-success"> Add new employee </div></a>
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Email</th>
        <th>holidays</th> 
        <th>Action</th> 

      </tr>
    </thead>
    <tbody>
    @foreach($AllEmployees as $Employee)
      @if($Employee->user_id == Auth::user()->id)

      <tr>
          <td>{{ $Employee->name }}</td>
          <td>{{ $Employee->email }}</td>
          <td>
                @foreach( $Employee->holidays as $holiday)
                <div class="text-info">{{ $holiday->holiday }}  </div>
                @endforeach
          </td>
          <td> 
          <form method="POST" action="/remove-employee/{{$Employee->id}}" >
          @csrf
              <button type="submit" class="btn btn-danger">delete </button>
        </form>
            <a href="/edit-employee/{{$Employee->id}}">
              <div class="btn btn-warning">edit</div>
            </a>
            <a href="/employee-attendence/{{$Employee->id}}">
              <div class="btn btn-info">attendence</div>
            </a>
            </td>
        </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  </section>
</div>

@endif
@endsection
