@extends('layout')
@section('title','$user->id')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col md-4">
        <label><b>Name:</b></label>
        <label>{{$users->name}}</label>
      </div>
    </div>
    <div class="row">
      <div class="col md-4">
        <label><b>Email:</b></label>
        <label>{{$users->email}}</label>
      </div>
    </div>
    <div class="row">
      <div class="col md-4">
        <label><b>Created at:</b></label>
        <label>{{$users->created_at}}</label>
      </div>
    </div>
    <div class="row">
      <div class="col md-4">
        <label><b>Updated at:</b></label>
        <label>{{$users->updated_at}}</label>
      </div>
    </div>
  </div>
</div>
@endsection