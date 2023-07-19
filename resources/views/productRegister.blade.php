@extends('layout')
@section('title','productRegister')
@section('content')
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
    <form action="{{route('register.product.post')}}" method="post" class="ms-auto me-auto"style="width: 500px">
  @csrf
  <div class="mb-3">
    <label class="form-label">Product name</label>
    <input type="text" class="form-control" name="product_name">
  </div>
  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" class="form-control" name="price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
@endsection