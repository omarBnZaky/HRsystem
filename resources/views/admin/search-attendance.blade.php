@extends('layouts.AdminPanel')

@section('content')
<div class="content-wrapper">
<section class="content container-fluid">
<h2>Basic Table</h2>
<a href="/edit-employee/{{$employee->id}}/create-employee-attendence"><div class="btn btn-info">Add Attendence</div></a>

<form method="POST" action="/employee-attendence/{{$employee->id}}/search/attendence">
@csrf
  <label for="pet-select">Choose a year:</label>
  <select id="pet-select" name="year">
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
  </select> <br>

  <label for="pet-select">Choose a month:</label>
  <select id="pet-select" name="month">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
  </select>
  <br>
  <button type="submit" class = "btn btn-success">search</button>
</form>


@if(isset($results))
  <table class="table">
    <thead>
      <tr>
        <th>come on</th>
        <th>gone at</th>
        <th>day</th>
        <th>attendence ratio</th>
      </tr>
    </thead>
    <tbody>
     
        @foreach($results as $result)
        <tr>
          <td>{{ $result->from }}</td>
          <td>{{ $result->to }}</td>
          <td>{{ $result->day }}</td>
          <td>{{ $result->attendence_ratio }}</td>
          </tr>
        @endforeach
     {{-- \Carbon\Carbon::createFromFormat('m/d/Y', $result->day) --}}
    </tbody>
  </table>


  @else
No search has been maded
  @endif
</section>
</div>


@endsection
