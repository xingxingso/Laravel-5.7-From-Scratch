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
        // $project = Project::find($id);
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update($id)
    {
        // dd('hello!');
        // dd(request()->all());

        // $project = Project::find($id);
        $project = Project::findOrFail($id);

        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }

    public function destroy($id)
    {
        // dd('hello');
        // Project::find($id)->delete();
        Project::findOrFail($id)->delete();

        return redirect('/projects');
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
