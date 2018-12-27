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

    public function show()
    {
        # code...
    }

    public function edit($id)
    {
        // return $id;
        $project = Project::find($id);
        return view('projects.edit', compact('project'));
    }

    public function update($id)
    {
        // dd('hello!');
        // dd(request()->all());

        $project = Project::find($id);

        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }

    public function destroy()
    {
    }

    public function store()
    {
        // return request()->all();
        $project = new Project();
        
        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }
}
