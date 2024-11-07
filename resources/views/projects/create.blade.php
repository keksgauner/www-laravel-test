@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Project Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded">{{ old('description') }}</textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Create
                Project</button>
        </div>
    </form>
@endsection
