<?php

namespace App\Http\Controllers;

use App\Task;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
        // dd(request()->all());
        // dd($task);

        $task->update([
            'completed' => request()->has('completed')
        ]);

        return back();
    }
}
