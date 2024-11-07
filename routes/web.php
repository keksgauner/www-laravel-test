<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');
    Route::get('/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/{project}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/{project}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('/{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
});