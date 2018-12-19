<?php

namespace App\Http\Controllers\TodoLists;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{

    public function index()
    {
        return response()->json(Task::get(), 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return response()->json(Task::create($request->all()), 201);
    }

    public function show(Task $task)
    {
        return response()->json($task, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        return response()->json($task->update($request->all()), 200);
    }

    public function destroy(Task $task)
    {
        return response()->json($task->delete(), 204);
    }
}
