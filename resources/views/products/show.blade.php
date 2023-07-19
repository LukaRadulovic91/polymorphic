@extends('layout')
@section('title','$product->id')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col md-4">
        <label><b>Name:</b></label>
        <label>{{$products->product_name}}</label>
      </div>
    </div>
    <div class="row">
      <div class="col md-4">
        <label><b>Price:</b></label>
        <label>{{$products->price}}</label>
      </div>
    </div>
    <div class="row">
      <div class="col md-4">
        <label><b>Created at:</b></label>
        <label>{{$products->created_at}}</label>
      </div>
    </div>
    <div class="row">
      <div class="col md-4">
        <label><b>Updated at:</b></label>
        <label>{{$products->updated_at}}</label>
      </div>
    </div>
  </div>
</div>
@endsection