@extends('layouts.app')

@section('title', 'Calculator')

@section('content')

    <div class=" flex items-center justify-center">
        <div class="w-screen max-w-80">
            <input disabled type="text" class="w-full p-2 border border-gray-300 rounded">
            <div class="w-full mt-5">
                <div class="grid grid-cols-4 gap-1">
                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">1</button></td>
                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">2</button></td>
                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">3</button></td>
                    <td><button class="p-5 text-white bg-blue-800 hover:bg-blue-950 rounded-xl">+</button></td>

                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">4</button></td>
                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">5</button></td>
                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">6</button></td>
                    <td><button class="p-5 text-white bg-blue-800 hover:bg-blue-950 rounded-xl">-</button></td>

                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">7</button></td>
                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">8</button></td>
                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">9</button></td>
                    <td><button class="p-5 text-white bg-blue-800 hover:bg-blue-950 rounded-xl">*</button></td>

                    <td><button class="p-5 text-white bg-red-800 hover:bg-red-950 rounded-xl">C</button></td>
                    <td><button class="p-5 text-white bg-purple-800 hover:bg-purple-950 rounded-xl">0</button></td>
                    <td><button class="p-5 text-white bg-green-800 hover:bg-green-950 rounded-xl">=</button></td>
                    <td><button class="p-5 text-white bg-blue-800 hover:bg-blue-950 rounded-xl">/</button></td>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('button');
                const display = document.querySelector('input');

                buttons.forEach(button => {
                    button.addEventListener('click', () => {
                        if (button.textContent === 'C') {
                            display.value = '';
                        } else if (button.textContent === '=') {
                            display.value = eval(display.value);
                        } else {
                            display.value += button.textContent;
                        }
                    });
                });
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
                            window.location.href = '{{ route('projects.index') }}';
                        } else if (diffX > 100) { // Threshold for right swipe
                            isDragging = false;
                            window.location.href = '{{ route('home') }}';
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
                            window.location.href = '{{ route('projects.index') }}';
                        } else if (diffX > 100) { // Threshold for right swipe
                            isDragging = false;
                            window.location.href = '{{ route('home') }}';
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
