<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home ()
    {
        $tasks = TaskModel::orderBy('id','desc')->paginate(5);

        return view('todo',compact('tasks'));
    }
}
