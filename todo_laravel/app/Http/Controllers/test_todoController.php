<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test_todoController extends Controller
{
    //
    public function test_todo()
    {
        return view('todos.test_todo');
    }

}
