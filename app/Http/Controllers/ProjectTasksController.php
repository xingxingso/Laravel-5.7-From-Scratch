<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $project->addTask(
            request()->validate(['description' => 'required'])
        );

        return back();
    }

    public function update(Task $task)
    {
        // $task->complete(request()->has('completed'));

        // if (request()->has('completed')) {
        //     $task->complete();
        // } else {
        //     $task->incomplete();
        // }

        // request()->has('completed') ? $task->complete() : $task->incomplete();

        $method = request()->has('completed') ? 'complete' : 'incomplete';
        
        $task->$method();

        return back();
    }
}
