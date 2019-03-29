@extends('layouts.AdminPanel')

@section('content')

<div class="content-wrapper">
<section class="content container-fluid">
<h2>Basic Table</h2>
@foreach($Employee->attnedences->sortBy('day') as $attnedence)
   <?php 
   $date = strtotime($attnedence->day);
   $month =date('m', $date);
   $day =date('d', $date);

 //  echo  $daysOfMonth.$month;
   ?>
      {{ $attnedence->day }} <br>
    
 
  @endforeach 
</section>
</div>


@endsection
