@extends('layouts.AdminPanel')

@section('content')
<div class="content-wrapper">
<section class="content container-fluid">
<h2>Edit an  Employee</h2>

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<form method="POST" action="/edit_employee/{{$Employee->id}}"> 
@csrf
<div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$Employee->name}}">
    </div>
<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$Employee->email}}"">
    </div>
    <div class="form-group">
      <label for="pwd">oldPassword:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter old password" name="oldPassword">
    </div>
    
    <div class="form-group">
      <label for="pwd">New Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter new password" name="password"> 
    </div>
    <div class="form-group">
      <label for="role">Holidays:</label><br>
      @foreach( $Employee->holidays as $holiday)

<div style="width:60px;background-color:green;color:white;border-radius:50px 50px" class="text-center">{{ $holiday->holiday }}</div>
 <a href="{{$Employee->id}}/delete-employee-holiday/{{$holiday->id}}" style="border-radius:50px 50px"><div class="btn btn-danger">Delete holiday</div></a>
  <br>

 @endforeach
 
 <div class="form-group">
        <label for="off_days">holidays:</label>
        <input type="checkbox" name="saturday"   value="saturday"> saturday
        <input type="checkbox" name="sunday"     value="sunday"> sunday 
        <input type="checkbox" name="monday"     value="monday"> monday 
        <input type="checkbox" name="tuesday"    value="tuesday"> tuesday 
        <input type="checkbox" name="wednesday"  value="wednesday"> wednesday 
        <input type="checkbox" name="thursday"   value="thursday"> thursday 
        <input type="checkbox" name="friday"     value="friday"> friday 
    </div>

      </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>


</section>

</div>

@endsection
