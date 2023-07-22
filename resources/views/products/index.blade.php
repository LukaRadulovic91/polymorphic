@extends('layout')
@section('title','index')
@section('content')
<h1>List of all products</h1>
<div id="success-message"></div>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddStudentModal">add product</a>
<!--Add product Modal -->
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
        <ul id="saveform_errList"></ul>
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

<!--Edit product Modal -->
<div class="modal fade" id="EditProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul id="updateform_errList"></ul>
        <input type="text" id="edit_prod_id">
        <div class="form-group mb-3">
          <label for="">Product name</label>
          <input type="text" id="edit_name" class="name form-control">
        </div>
        <div class="form-group mb-3">
          <label for="">Price</label>
          <input type="number"  id="edit_price"  class="price form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_product">Update</button>
      </div>
    </div>
  </div>
</div>

<!--Add product Modal -->
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
        <ul id="saveform_errList"></ul>
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
      </tbody>
</table>
</div>

@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    fetchProducts();

    function fetchProducts()
    {
      $.ajax({
        type:"GET",
        url:"/fetch-products",
        dataType:"json",
        success:function(response){
          $('tbody').html("");
          $.each(response.products,function(key,item){
          $('tbody').append('<tr>\
          <td>'+item.id+'</td>\
          <td>'+item.product_name+'</td>\
          <td>'+item.price+'</td>\
          <td>'+item.created_at+'</td>\
          <td>'+item.updated_at+'</td>\
          <td><button type="button" value="'+item.id+'" class="edit_product btn btn-primary">EDIT</button></td>\
          <td><button type="button" value="'+item.id+'" class="delete_product btn btn-danger">DELETE</button></td>\
          </tr>');
        });
      }
      });
    }
    
    $(document).on('click','.edit_product',function(e){
      e.preventDefault();
      var prod_id=$(this).val();
      $('#EditProductModal').modal('show');
      $.ajax({
        type:"GET",
        url:"/edit_product/"+prod_id,
        success:function(response){
          if(response.status==404){
            $('#success_messsage').html("");
            $('#success_messsage').addClass("alert alert-danger");
            $('#success_messsage').text(response.message);
          }
          else{
            $('#edit_name').val(response.product.name);
            $('#edit_price').val(response.product.price);
            $('#edit_prod_id').val(prod_id);

          }
        }
      });
    });

    $(document).on('click','.update_product',function(e){
      e.preventDefault();
      var prod_id=$('#edit_prod_id').val();
      var data={
        'name':$('edit_name').val(),
        'price':$('edit_price').val()
      }
    });
    $.ajax({
      type:"PUT",
        url:"/update-product/"+prod_id,
        data:data,
        dataType:"json",
        success:function(response){
          if(response.status==400){
            $('#updateform_errList').html("");
            $('#updateform_errList').addClass("alert alert-danger");
            $.each(response.errors,function(key,err_values){
              $('#updateform_errList').append('<li>'+err_values+'</li>');
            });
            
          }else if(response.status==404){
            $('#updateform_errList').html("");
            $('#success_message').addClass("alert alert-success");
            $('#success_message').text(response.message);
          }else{
            $('#updateform_errList').html("");
            $('#success_message').html("");
            $('#success_message').addClass("alert alert-success");
            $('#success_message').text(response.message);
            $('#EditProductModal').modal('hide');
            fetchProducts();
          }
        }
      });
    });
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
          //console.log(response.errors.name);
          if(response.status==400){
            $.each(response.errors,function(key,err_values){
              $('#saveform_errList').html("");
              $('#saveform_errList').addClass('alert alert-danger');
              $('#saveform_errList').append('<li>'+err_values+'</li>');
            
          });
        }
        else{
          $('#saveform_errList').html("");
          $('#success-message').addClass('alert alert-success');
          $('#success-message').text(response.message);
          $('#addProductModal').modal('hide');
          $('#addProductModal').modal('input').val('');
          fetchProducts();
        }
      }
      });
    });
</script>
@endsection
