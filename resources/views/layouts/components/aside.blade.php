<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{asset('dist/img/iqlogo.png')}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{Auth::user()->name}}</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">dashbord</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="home"><i class="fa fa-link"></i> <span>Dashbord</span></a></li>

@if(Auth::user()->id ==1)
       <li><a href="/All-members"><i class="fa fa-link"></i> <span>All members</span></a></li>
       <li><a href="/add-member"><i class="fa fa-link"></i> <span>add member</span></a></li>
       <li><a href="/add-admin"><i class="fa fa-link"></i> <span>add admin</span></a></li>
       <li><a href="/add-manager"><i class="fa fa-link"></i> <span>add manager</span></a></li>
       <li><a href="/add-team-leader"><i class="fa fa-link"></i> <span>add team leader</span></a></li>
       <li><a href="/add-hr-manager"><i class="fa fa-link"></i> <span>add hr manager</span></a></li>

    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Employees</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
      <li><a href="/All-employees">All employees</a></li>
        <li><a href="/add-employee">add employee</a></li>
      </ul>
    </li>

@else
     @foreach(Auth::user()->roles as $role)
       @if($role ->id == 4)
       <li><a href="/All-members"><i class="fa fa-link"></i> <span>All members</span></a></li>
       <li><a href="/add-member"><i class="fa fa-link"></i> <span>add member</span></a></li>
       <li><a href="/add-admin"><i class="fa fa-link"></i> <span>add admin</span></a></li>
       <li><a href="/add-manager"><i class="fa fa-link"></i> <span>add manager</span></a></li>
       <li><a href="/add-team-leader"><i class="fa fa-link"></i> <span>add team leader</span></a></li>
       <li><a href="/add-hr-manager"><i class="fa fa-link"></i> <span>add hr manager</span></a></li>

       <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Employees</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
      <li><a href="/All-employees">All employees</a></li>
        <li><a href="/add-employee">add employee</a></li>
      </ul>
    </li>
 
      @else
      <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Employees</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
      <li><a href="/All-employees">All employees</a></li>
        <li><a href="/add-employee">add employee</a></li>
      </ul>
    </li>
      @endif
     @endforeach
 @endif
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>