@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Patient</div>
  <div class="card-body">
      
      <form action="{{ url('patients/' . $patients->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $patients->id }}" id="id" required />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{ $patients->name }}" class="form-control"></br>
        <label>Age</label></br>
        <input type="number" name="age" id="age" value="{{ $patients->age }}" class="form-control"></br>
        <label>Gender</label></br>
        <select name="gender" id="gender" class="form-control">
            <option value="Male" {{ $patients->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $patients->gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
