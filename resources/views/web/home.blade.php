@extends('layouts.layout')
@section('content')
<h2>Directions Search:</h2>
<form id ='searchForm' class="form-inline" role="form">
<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
<div class="form-group" >
  <label for="sel1">From city</label>
  <select class="form-control" id="from_city" name="from_city">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
<div class="form-group">
  <label for="sel1">To city</label>
  <select class="form-control" id="to_city" name="to_city">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button id = "sendRequest"class="btn btn-success">Search</button>
    </div>
  </div>
</form>
@include('web.data')
@endsection
@section('data')

@endsection


