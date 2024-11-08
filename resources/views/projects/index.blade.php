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
    <h1 class="text-xl">All Projects (<span id="project-count">Loading...</span>)</h1>
    @if ($projects->isEmpty())
        <p>No projects found.</p>
    @else
        <ul>
            @foreach ($projects as $project)
                <li class="flex justify-between items-center">
                    <span>{{ $project->name }}: {{ $project->description }}</span>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('projects.edit', $project) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded m-1">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 m-1 px-2 rounded">
                                Remove
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('projects.count') }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('project-count').textContent = data.count;

                    setInterval(updateProjectCount, 30000);
                });

            function updateProjectCount() {
                fetch('{{ route('projects.count') }}')
                    .then(response => response.json())
                    .then(data => {
                        const projectCountElement = document.getElementById('project-count');
                        const currentCount = projectCountElement.textContent;
                        if (currentCount !== data.count) {
                            location.reload();
                        } else {
                            projectCountElement.textContent = data.count;
                        }
                    });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let startX;
            let isDragging = false;

            document.addEventListener('mousedown', function(event) {
                startX = event.clientX;
                isDragging = true;
            });

            document.addEventListener('mousemove', function(event) {
                if (isDragging) {
                    const currentX = event.clientX;
                    const diffX = currentX - startX;

                    if (diffX < -100) { // Threshold for left swipe
                        isDragging = false;
                        window.location.href = '{{ route('home') }}';
                    } else if (diffX > 100) { // Threshold for right swipe
                        isDragging = false;
                        window.location.href = '{{ route('calculator') }}';
                    }
                }
            });

            document.addEventListener('mouseup', function() {
                isDragging = false;
            });

            document.addEventListener('mouseleave', function() {
                isDragging = false;
            });

            // Touch events for mobile
            document.addEventListener('touchstart', function(event) {
                startX = event.touches[0].clientX;
                isDragging = true;
            });

            document.addEventListener('touchmove', function(event) {
                if (isDragging) {
                    const currentX = event.touches[0].clientX;
                    const diffX = currentX - startX;

                    if (diffX < -100) { // Threshold for left swipe
                        isDragging = false;
                        window.location.href = '{{ route('home') }}';
                    } else if (diffX > 100) { // Threshold for right swipe
                        isDragging = false;
                        window.location.href = '{{ route('calculator') }}';
                    }
                }
            });

            document.addEventListener('touchend', function() {
                isDragging = false;
            });

            document.addEventListener('touchcancel', function() {
                isDragging = false;
            });
        });
    </script>
@endsection
