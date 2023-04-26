<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Task;

class ApplicationController extends Controller
{
    public function apply($id)
    {
        $application = new Application;
        $application->student_id = auth()->user()->id;
        $application->task_id = $id;
        $application->student_name = auth()->user()->name;
        $result = $application->save();

        if($result){
            return redirect('/dashboard');
        }
    }

    public function index($id)
    {
        $task = Task::find($id);
        $application = Application::where('task_id', $id)->get();
        
        return view('applications', ['application' => $application, 'task' => $task]);
    }

    public function accept(Request $request)
    {
        $task = Task::find($request->id);
        $application = Application::where('student_name', $request->name)->first();
        $stud_id = $application->student_id;

        $task->student_id = $stud_id;
        $task->isApproved = true;
        $result = $task->save();

        if($result)
        {
            return redirect('/dashboard');
        }
    }
}
