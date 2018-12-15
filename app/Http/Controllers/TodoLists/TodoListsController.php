<?php

namespace App\Http\Controllers\TodoLists;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoListsController extends Controller
{

    public function index()
    {
//        dd('dddd');
//        return "dddd";
        return TodoList::all();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
