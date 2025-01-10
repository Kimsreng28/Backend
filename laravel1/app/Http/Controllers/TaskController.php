<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
    public function create(){
        return view('tasks.create');
    }
    public function store(Request $request) {
        //validate the request
        $request->validate([
            'title' => 'required|min:10',
        ]);

        Task::create([
            'title' => $request->title,]);

        return redirect()->route('tasks.index');
    }
    public function edit(Task $task) {
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, Task $task) {
        // validate the request
        $request->validate([
            'title' => 'required|min:10',
        ]);

        $task->update([
            'title' => $request->title,
            'is_complete' => $request->has('is_complete'),
        ]);

        return redirect()->route('tasks.index');
    }
    public function destroy(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
