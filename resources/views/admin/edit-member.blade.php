@extends('layouts.AdminPanel')

@section('content')
<div class="content-wrapper">
<section class="content container-fluid">
<h2>Edit member</h2>

{{ Html::ul($errors->all()) }}

<form method="POST" action="/edit-member/{{$user->id}}"> 
@csrf
<div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$user->name}}">
    </div>
<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$user->email}}"">
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
      <label for="role">Role:</label><br>
      current roles:  <br>
      @foreach( $user->roles as $role)

<div style="width:60px;background-color:green;color:white;border-radius:50px 50px" class="text-center">{{ $role->name }}</div>
 <a href="{{$user->id}}/delete-user-role/{{$role->id}}" style="border-radius:50px 50px"><div class="btn btn-danger">Delete role</div></a>
  <br>

 @endforeach
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
