@extends('layouts.AdminPanel')

@section('content')
<div class="content-wrapper">
<section class="content container-fluid">
<h2>give member permision</h2>
<form method="POST" action="/Add-role/{{$user->id}}/{role_id}"> 
@csrf
<div class="form-group">
 <select class="form-control">
        <option value="0">....</option>
      
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
</select>
</div>
    <button type="submit" class="btn btn-success">add this role for {{$user->name}}</button>
  </form>


</section>

</div>

@endsection
