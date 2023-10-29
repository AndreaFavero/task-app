<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    const LIMIT = 5;

    function list(Request $request){
        $tasks = Task::when(Auth::user()->isOperator(), function($sub){
            $sub->where('user_id', Auth::user()->id);
        })
        ->orderBy('completed')
        ->orderBy('due_date')
        ->paginate(self::LIMIT);

        return view('task.list')->with([
            'tasks' => $tasks,
        ]);
    }

    function edit(Request $request, $id = null){
        $task = Task::when(Auth::user()->isOperator(), function($sub){
            $sub->where('user_id', Auth::user()->id);
        })
        ->where('id', $id)
        ->firstOrNew();

        return view('task.edit')->with([
            'task' => $task,
        ]);
    }

    function post(Request $request){

        $request->validate([
            'title' => ['required'],
            'description' => ['nullable'],
            'due_date' => ['nullable', 'date'],
            'completed' => ['nullable'],
        ]);

        $task = Task::findOrNew($request->get('id'));

        if(Auth::user()->isOperator() && $request->get('id') && $task->user_id != Auth::user()->id){
            abort(403, __('diz.edit_not_allowed'));
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        if($request->get('completed')){
            $data['completed'] = true;
        }
        else{
            $data['completed'] = false;
        }

        $task->fill($data);
        $task->save();

        $success = __('diz.create_success');
        if($request->get('id')){
            $success = __('diz.edit_success');
        }

        return redirect()->route('task.list')->with(['success' => $success]);
    }

    function complete(Request $request){
        $task = Task::findOrFail($request->get('task_id'));

        if(Auth::user()->isOperator() && $task->user_id != Auth::user()->id){
            abort(403, __('diz.complete_action_not_allowed'));
        }

        $task->completed = true;
        $task->save();

        return redirect()->back()->with(['success' => __('diz.complete_success')]);
    }

    function delete(Request $request, $id){
        $task = Task::findOrFail($id);

        if(Auth::user()->isOperator() && $task->user_id != Auth::user()->id){
            abort(403, __('diz.delete_action_not_allowed'));
        }

        $task->delete();

        return redirect()->back()->with(['success' => __('diz.complete_success')]);
    }
}
