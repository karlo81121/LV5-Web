<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('nastavnik_id', auth()->user()->id)->get();
        return view('tasks', compact('tasks'));
    }

    public function indexAll()
    {
        $tasks = Task::where('student_id', null)->get();
        $studenttasks = Task::where('student_id', auth()->user()->id)->get();
        return view('student', compact('tasks', 'studenttasks'));
    }

    public function store(Request $request)
    {
        $task = new Task;

        $task->nastavnik_id = auth()->user()->id;
        $task->naziv_rada = $request->naziv_rada;
        $task->naziv_rada_eng = $request->naziv_rada_eng;
        $task->zadatak_rada = $request->zadatak_rada;
        $task->tip_studija = $request->tip_studija;

        $result = $task->save();

        if($result){
            return redirect('/tasks');
        }
    }
}
