@extends('layout')

@section('content')
    <h1 class="title">Projects</h1>
    
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="/projects/{{ $project->id }}">
                    {{ $project->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
