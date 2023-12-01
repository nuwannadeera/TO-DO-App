<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class taskController extends Controller {

    public function saveNewTask(Request $request) {
//    dd($request -> all());
        $task = new Task;

        $this->validate($request, [
            'task' => 'required|max:150|min:2'
        ]);

        $task->task = $request->task;
//        return redirect()->back();
        $task->save();
        $dataList = Task::all();
//me widihta gannth puluwn oya uda line eka^^^^^
//        $dataList = DB::table('task')->get();

//        dd($dataList);
        return view('tasks')->with('taskList', $dataList);
    }


    public function updateCompleteTaskStatus($id) {
        $task = Task::find($id);
        $task->is_completed = 1;
        $task->save();
        return redirect()->back();
    }

    public function updateIncompleteTaskStatus($id) {
        $task = Task::find($id);
        $task->is_completed = 0;
        $task->save();
        return redirect()->back();
    }

    public function deleteTask($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function updateTask($id) {
        $task = Task::find($id);
        return view('updatetask')->with('taskData', $task);
    }

    public function updateTaskName(Request $request, $id) {
        $task_name = $request->task;
        $data = Task::find($id);
        $data->task = $task_name;
        $data->save();
        $dataList = Task::all();
        return view('tasks')->with('taskList', $dataList);
    }
}
