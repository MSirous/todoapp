<?php

namespace App\Http\Controllers\TodoLists;

use App\Http\Resources\TodoList\TodoListCollection;
use App\Models\Task;
use App\Models\TodoList;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TodoListsController extends Controller
{

    public function index()
    {
        return response()->json(TodoList::all(), 200);
//        $todolistResource = TodoListCollection::all();
//        return new TodoListResource($todolistResource);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:20',
            'description' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $newTodo = TodoList::create($request->all());
        return response()->json($newTodo, 201);
    }

// single Id return
    public function show($id)
    {
        $todo = TodoList::find($id);
        if (is_null($todo))
        {
            return response()->json($todo, 404);
        }
        return response()->json(TodoList::findOrFail($id), 200);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, TodoList $todo)
    {
//        dd($request);
        $todo->update($request->all());
        return response()->json($todo, 200);
    }


    public function destroy($id)
    {
        //
    }

    public function error()
    {
        return response()->json(['msg' => 'need something else.'], 501);
    }

    public function tasks(Request $request, TodoList $todo)
    {
        $tasks = $todo->tasks()->get();
        return response()->json($tasks, 200);
    }
}
