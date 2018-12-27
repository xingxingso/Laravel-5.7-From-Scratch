<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        // $attributes = request()->validate([
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'description' => 'required|min:3'
        // ]);

        // return $attributes;

        // Project::create(request(['title', 'description']));
        // Project::create($attributes);

        Project::create(
            request()->validate([
                'title' => ['required', 'min:3', 'max:255'],
                'description' => 'required|min:3'
            ])
        );

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        // $project->title = request('title');
        // $project->description = request('description');
        $project->update(request(['title', 'description']));

        // $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
