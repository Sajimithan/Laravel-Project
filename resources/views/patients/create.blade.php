@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Patients Page</div>
  <div class="card-body">
      
      <form action="{{ url('patients') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" required></br>
        <label>Age</label></br>
        <input type="number" name="age" id="age" class="form-control" required></br>
        <label>Gender</label></br>
        <select name="gender" id="gender" class="form-control" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
