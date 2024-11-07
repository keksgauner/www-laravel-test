<!-- resources/views/projects/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Edit Project</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Project Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}"
                class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded">{{ old('description', $project->description) }}</textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update
                Project</button>
        </div>
    </form>
@endsection
