@extends('layouts.AdminPanel')

@section('content')
<div class="content-wrapper">
<section class="content container-fluid">
<h2>Basic Table</h2>
  <div class="panel panel-default">
    <div class="panel-body">
            <form>
            <label for="pet-select">Choose a year:</label>

             <select id="pet-select" name="year">
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select> 
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

  <button type="submit" class = "btn btn-success">search</button>

            </form>
   </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>City</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>
    </tbody>
  </table>
</section>
</div>


@endsection
