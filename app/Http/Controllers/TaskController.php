<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function store(Request $request){

        //to check database connection, we use 'dd' command
        //dd($request->all());


        //create a new object for task model
        $task = new Task;

        //validate Input data
        $this->validate($request,[
            'task'=>'required|max:100|min:5', 
        ]);

        //input data to database
        $task->task=$request->task;
        $task->save();
         

        //data retriving using 'dd' cmd
        //$data=Task::all();
        //dd($data);

        $data=Task::all();
        return view('tasks')->with('tasks',$data);

        //show redirecting page
        //return redirect()->back();
    
    }

public function UpdateTaskAsCompleted($id){

    //show all data according to that's task table's id using Task model class
    $task=Task::find($id);

    //$task is following id's data that we found, (in task's tables task field) is updating now 
    $task->iscompleted=1;
    $task->save();
    return redirect()->back();
}


public function UpdateTaskAsNotCompleted($id){
    //show all data according to that's task table's id using Task model class
    $task=Task::find($id);

    //$task is following id's data that we found, (in task's tables task field) is updating now 
    $task->iscompleted=0;
    $task->save();
    return redirect()->back();

}

public function deletetask($id){
    //find task laravel method
    $task=Task::find($id);

    //delete laravel method
    $task->delete();
    return redirect()->back();    
}

public function updatetaskview($id){
    $task=Task::find($id);

    return view('updatetask')->with('taskdata',$task);
}

public function updatetask(Request $request){

  $id=$request->id;
  $task=$request->task;

  $data=Task::find($id);
  $data->task=$task;
  $data->save();

  $datas=Task::all();
  return view('tasks')->with('tasks',$datas);

}

}