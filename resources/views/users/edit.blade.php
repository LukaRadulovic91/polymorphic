@extends('layout')
@section('title','edit')
@section('content')
<div class="container">
<div class="mt-5">
      @if($errors->any())
        <div class="col-12">
          @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
      @endforeach
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
<form action="{{url('users/'.$user->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{$user->name}}" class="form-control">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{$user->email}}" class="form-control">
  </div>
    <button class="btn btn-success" type="submit">EDIT USER</button>
</form>
</div>
@endsection