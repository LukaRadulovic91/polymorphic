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
    <h1>Edit product</h1>
<form action="{{url('products/'.$product->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label>Product name</label>
    <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control">
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" value="{{$product->price}}" class="form-control">
  </div>
    <button class="btn btn-success" type="submit">EDIT PRODUCT</button>
</form>
</div>
@endsection