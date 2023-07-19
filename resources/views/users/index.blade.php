@extends('layout')
@section('title','index')
@section('content')
<h1>List of all users</h1>
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

<th>name</th>

<th>email</th>

<th>created_at</th>

<th>updated_at</th>

<th>edit</th>

<th>delete</th>

</thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->created_at}}</td>
          <td>{{$user->updated_at}}</td>
          <td>
            <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-primary">EDIT</a>
          </td>
          <td>
            <a href="/delete/{{$user->id}}" class="btn btn-danger">DELETE</a>
          </td>
          <td>
            <a href="/show/{{$user->id}}" class="btn btn-success">SHOW</a>
          </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
@endsection
