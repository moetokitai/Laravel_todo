<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{
    public function index(){
        $todos=Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request){
        

        //validate
        $this->validate( $request,[
            'title'=>'required|min:10|max:20',
            'content'=>'required|min:25'
        ]);

        //store todos to db
        $todo=new Todo;
        $todo->title=$request->title;
        $todo->content=$request->content;
        $todo->save();

        //session message
        Session::flash('success','Todo Created Successfully');
    
     //return back to index page
     return redirect(route('todos.index'));

        }


    public function show(Todo $todo){
        //$todo=Todo::findorfail($id);
        return view('todos.show')->with('todo',$todo);
    }

    public function edit(Todo $todo){
        //$todo=Todo::findorfail($id);
        return view('todos.edit')->with('todo',$todo);
    }

    public function update(Request $request,Todo $todo){
        //validate
        $this->validate( $request,[
            'title'=>'required|min:10|max:20',
            'content'=>'required|min:25'
        ]);
        //$todo=Todo::findorfail($id);
        $todo->title=$request->title;
        $todo->content=$request->content;
        $todo->save();

        Session::flash('success','Todo Updated Successfully');


        //return back to index page
     return redirect(route('todos.index'));
    }


     public function delete(Todo $todo){
        
        //$todo=Todo::findorfail($id);
         $todo->delete();

        Session::flash('success','Todo Deleted Successfully');
          

         return redirect()->back();
     }

     public function done(Todo $todo){
        //$todo=Todo::findorfail($id);
        $todo->completed=1;
        $todo->save();
    

        Session::flash('success','Todo Completed Successfully');
       return redirect()->back();
}
public function not_done(Todo $todo){
    //$todo=Todo::findorfail($id);
    $todo->completed=0;
    $todo->save();


    Session::flash('error','Todo Still Pending..');
   return redirect()->back();
}
}