@extends('layouts.app')

@section('content')

<h1 class="text-center">Todo Details</h1>

<div class="card">
  <div class="card-header">{{$todo->title}}</div>
  <div class="card-body">
    <div>{{$todo->content}}</div>
  <a href="{{route('todos.edit',['id'=>$todo->id])}}" class="btn btn-primary">Edit</a>
  <a href="{{route('todos.index')}}" class="btn btn-secondary float-right">Go back</a>
  </div>
  </div>

  @endsection