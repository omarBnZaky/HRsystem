@extends('layouts.AdminPanel')

@section('content')
<div class="content-wrapper">
<section class="content container-fluid">
<h2>create role</h2>
<form method="POST" action="{{route('storerole')}}"> 
@csrf

<
<div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
    </div>

    
    <button type="submit" class="btn btn-success">add role</button>
  </form>


</section>

</div>

@endsection
