@extends('layouts.app')

@section('content')

<h1 class="text-center">Todo Details</h1>

<div class="card">
  <div class="card-header">Create New Todo</div>
  <div class="card-body">
   @if($errors->any())
   <div class="alert alert-danger">
    <ul class="list-group">
      @foreach($errors->all() as $error)
      <li class="list-group-item">{{$error}}</li>
       @endforeach
     </ul>
     </div>
     @endif

    <form action="{{route('todos.store')}}" method="post">
      @csrf
    <div class="form-group">
      <input type="text" name="title" class="form-control" placeholder="Please enter your todos here">
    </div>
    <div class="form-group">
        <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Enter your todos content"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-block btn-success">Store Todo</button>
      </div>
      </form>
  </div>
  </div>

  @endsection