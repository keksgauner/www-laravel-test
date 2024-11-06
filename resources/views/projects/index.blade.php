@extends('layouts.app')

@section('title', 'Index Page')

@section('content')
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}">Create Project</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($projects->isEmpty())
        <p>No projects found.</p>
    @else
        <ul>
            @foreach ($projects as $project)
                <li>{{ $project->name }}: {{ $project->description }}</li>
            @endforeach
        </ul>
    @endif
@endsection
