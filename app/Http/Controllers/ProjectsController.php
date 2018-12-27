<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        // $porjects = \App\Project::all();
        $projects = Project::all();

        // return $projects;
        return view('projects.index', compact('projects'));
    }
}
