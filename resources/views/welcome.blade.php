@extends('layout')

@section('content')
    {{-- <h1>My {!! $foo !!} Website!</h1> --}}
    <h1>My {{ $foo }} Website!</h1>

    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>
@endsection
