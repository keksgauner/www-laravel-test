@extends('layouts.app')

@section('title', 'Index Page')

@section('content')
    <h1>Welcome to the Index Page</h1>
    <p>This is the content of the index page.</p>
    <a href="{{ route('projects.first') }}">First Project</a>
@endsection
