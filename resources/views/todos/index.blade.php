@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Todos</div>
  <div class="card-body">
      @if(count($todos) > 0)
      <ul class="list-group">
          @foreach($todos as $todo)
              <li class="list-group-item" >
                  {{ $todo->title }}
                  <form action="{{route('todos.delete',['id'=>$todo->id])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn btn-danger float-right" value="Delete">
                  </form>

                       <a href="{{route('todos.show',['id'=>$todo->id])}}" class="btn btn-primary float-right mr-2">View</a> 
                @if($todo->completed)
                       <a href="{{route('todos.not-completed',['id'=>$todo->id])}}" class="btn btn-success float-right mr-2">Done<a> 
                @else
                       <a href="{{route('todos.completed',['id'=>$todo->id])}}" class="btn btn-danger float-right mr-2">Not Done</a> 
                @endif
              </li>
          @endforeach
      </ul>
      @else
          <p class="text-center">No Todos found.</p>
      @endif
  </div>
</div>

  @endsection