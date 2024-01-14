<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class AdminTasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('admin.tasks.index', compact('tasks'));
    }
}
