<?php

namespace App\Http\Controllers\TodoList;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoListController extends Controller
{
    public function index()
    {
//        dd('dfdfdf');
//        return 'sdsdsd';
        return TodoList::all();
    }

}
