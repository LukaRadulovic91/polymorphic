@extends('layout')
@section('title','index')
@section('content')
<h1>List of all products</h1>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddStudentModal">add product</a>
<!-- Modal -->
<div class="modal fade" id="AddStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="">Product name</label>
          <input type="text" class="name form-control">
        </div>
        <div class="form-group mb-3">
          <label for="">Price</label>
          <input type="number" class="price form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_product">Save</button>
      </div>
    </div>
  </div>
</div>


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
<div class="col-md-8">
  <table class="table table-bordered">
<thead>

<th>id</th>

<th>Product name</th>

<th>price</th>

<th>created_at</th>

<th>updated_at</th>

<th>edit</th>

<th>delete</th>

<th>show</th>

</thead>
      <tbody>
      @foreach($products as $product)
          <tr>    
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>                 
          <td>
            <a href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-primary">EDIT</a>
          </td>
          <td>
            <a href="/delete/{{$product->id}}" class="btn btn-danger">DELETE</a>
          </td>
          <td>
            <a href="/show/{{$product->id}}" class="btn btn-success">SHOW</a>
          </td>
    </tr>
    @endforeach
      </tbody>
</table>
</div>

@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    $(document).on('click','.add_product',function(e){
      e.preventDefault();
      var data={
        'name':$('.name').val(),
        'price':$('.price').val()
      }
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        type:"POST",
        url:"/products/index",
        data:data,
        dataType:"json",
        success:function(response){
          console.log(response);
        }
      })
    });
  });
</script>
@endsection
