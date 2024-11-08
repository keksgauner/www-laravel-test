@extends('layouts.app')

@section('title', 'Welcome Page')

@section('content')
    <h1>Welcome to my website</h1>
    <p>This is the content of the welcome page.</p>
@endsection

@section('scripts')
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
                        window.location.href = '{{ route('calculator') }}';
                    } else if (diffX > 100) { // Threshold for right swipe
                        isDragging = false;
                        window.location.href = '{{ route('projects.index') }}';
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
                        window.location.href = '{{ route('calculator') }}';
                    } else if (diffX > 100) { // Threshold for right swipe
                        isDragging = false;
                        window.location.href = '{{ route('projects.index') }}';
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
