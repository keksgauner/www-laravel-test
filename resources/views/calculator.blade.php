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

    @endsection
