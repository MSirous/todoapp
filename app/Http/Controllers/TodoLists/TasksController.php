<?php

namespace App\Http\Controllers\TodoLists;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function store(Request $request, $todoListId)
    {
        $this->validate($request,
            [
                'title' => 'required'
            ]);
        $todoList = TodoList::findOrFail($todoListId);
        $task = $todoList->tasks()->create($request->all());
        return compact($task);
    }
}
