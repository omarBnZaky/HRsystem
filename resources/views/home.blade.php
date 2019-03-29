@extends('layouts.AdminPanel')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Dashboard
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
                    @if (session('status'))
                    <div class="panel panel-default">
                        <div class="panel-body">
                        {{ session('status') }}
                        </div>
                   </div>
                    @endif
                    
                  
       <div class="row">
       
       @if(Auth::user()->id == 1)
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$usersCount}}</h3>

              <p>Main members</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="All-members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
    </div> 
       @else
     @foreach(Auth::user()->roles as $role)
     @if($role->id == 1)

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $AllusersExpectAdminCount }}</h3>

              <p>Main members</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="All-members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
    </div> 
    @endif
  @endforeach
@endif


    
    </section>
    <!-- /.content -->
  </div>

@endsection
