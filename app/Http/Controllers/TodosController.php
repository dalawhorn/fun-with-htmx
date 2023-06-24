<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(Request $request) {
        $todos = $request->session()->get('todos');
        return view('todos', ['todos' => $todos]);
    }

    public function store(Request $request) {
        $todo_val = $request->get('todo_val');
        $request->session()->push('todos', $todo_val);
        $todos = $request->session()->get('todos');
        return view('components.todo-list', ['todos' => $todos]);
    }
}
