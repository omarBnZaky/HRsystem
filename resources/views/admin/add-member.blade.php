@extends('layouts.AdminPanel')

@section('content')
<div class="content-wrapper">
<section class="content container-fluid">
<h2>Add a  member</h2>
{{ Html::ul($errors->all()) }}

<form method="POST" action="/create_member"> 
@csrf
<div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    
    <div class="form-group">
      <label for="role">Role:</label>
      
 <select class="form-control" name="role_id"> 
      @foreach($Roles as $Role)
        <option value="{{$Role->id}}">{{$Role->name}}</option>
        @endforeach    
</select>

      </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>


</section>

</div>

@endsection
