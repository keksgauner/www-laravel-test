<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');
    Route::get('/first', [ProjectsController::class, 'first'])->name('projects.first');
});