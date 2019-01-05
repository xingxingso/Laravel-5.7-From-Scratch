<?php

namespace App\Http\Controllers;

use App\Project;
use App\Mail\ProjectCreated;
// use Illuminate\Filesystem\Filesystem;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->only();
        // $this->middleware('can:update,project')->except(['index']);
    }

    public function index()
    {
        // auth()->id()
        // auth()->user()
        // auth()->check()
        // auth()->guest()

        // $projects = Project::all();
        $projects = Project::where('owner_id', auth()->id())->get();
        // $projects = Project::where('owner_id', auth()->id())->take(2)->get();
        // dump($projects);

        // cache()->rememberForever('stats', function () {
        //     return ['lesson' => 1300, 'hours' => 50000, 'series' => 100];
        // });

        // $stats = cache()->get('stats');
        // dump($stats);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        // Project::create(
        //     request()->validate([
        //         'title' => ['required', 'min:3', 'max:255'],
        //         'description' => 'required|min:3'
        //     ]) + ['owner_id' => auth()->id()]
        // );

        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required|min:3'
        ]);

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        \Mail::to('kantchan.zxc@gmail.com')->send(
            new ProjectCreated($project)
        );

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        // if ($project->owner_id !== auth()->id()) {
        //     abort(403);
        // }
        // abort_if ($project->id !== auth()->id(), 403);
        // abort_unless(auth()->user()->owns($project), 403);
        
        // abort_unless(auth()->user()->can('update', $project), 403);

        // $this->authorize('update', $project);

        // if (\Gate::denies('update', $project)) {
        //     abort(403);
        // }
        // abort_if(\Gate::denies('update', $project), 403);
        // abort_unless(\Gate::allows('update', $project), 403);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        // $this->authorize('update', $project);

        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        // $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');
    }
}
