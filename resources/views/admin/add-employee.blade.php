@extends('layouts.AdminPanel')

@section('content')
<div class="content-wrapper">
<section class="content container-fluid">
<h2>Add a  Employee </h2>

@if(isset($errors))
{{ Html::ul($errors->all()) }}
@endif
<form method="POST" action="/create_employee"> 
@csrf
<div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
    </div>
<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
    </div>
    
<div class="form-group">
      <label for="job_title">job:</label>
      <input type="text" class="form-control" id="job_title" placeholder="Enter job title" name="job_title" value="{{ old('job_title') }}">
    </div>
    

    
    <div class="form-group">
      <label for="from">from:</label>
      <input type="time" class="form-control" id="from" placeholder="from hour" name="from">
    </div>
    
    <div class="form-group">
      <label for="to">to:</label>
      <input type="time" class="form-control" id="to" placeholder="to hour password" name="to">
    </div>
    
    <div class="form-group">
      <label for="salary">salary:</label>
      <input type="number" class="form-control" id="salary" placeholder="salary" name="salary">
    </div>
    
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
    <button type="submit" class="btn btn-success">Submit</button>
  </form>


</section>

</div>

@endsection
