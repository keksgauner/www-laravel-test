@extends('layouts.app')

@section('title', 'View Projects')

@section('content')
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        <a href="{{ route('projects.create') }}">Create Project</a>
    </button>
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-xl">All Projects</h1>
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
