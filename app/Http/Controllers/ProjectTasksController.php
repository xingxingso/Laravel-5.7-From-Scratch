<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required']);

        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request('description'),
        // ]);

        $project->addTask($attributes);

        return back();
    }

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
