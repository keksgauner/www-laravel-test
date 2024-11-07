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
                <li class="flex justify-between items-center">
                    <span>{{ $project->name }}: {{ $project->description }}</span>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this project?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 my-1 px-2 rounded">
                            Remove
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
