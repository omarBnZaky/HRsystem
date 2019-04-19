@extends('layouts.AdminPanel')

@section('content')

<div class="content-wrapper">
<section class="content container-fluid">
<h2>add attendence </h2>

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
<form method="POST" action="/edit-employee/{{$employee->id}}/store-employee-attendence"> 
@csrf
    <div class="form-group">
      <label for="name">day:</label>
      <input type="date" class="form-control" name="day">
    </div>

    <div class="form-group">
    <label for="from">from:</label>
      <input type="time" class="form-control" name="from">
    </div>

    <div class="form-group">
    <label for="to">to:</label>
      <input type="time" class="form-control" name="to">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>

</form>
</section>
</div>
@endsection