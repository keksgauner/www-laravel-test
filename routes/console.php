<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('greet {name}', function ($name) {
    $this->info("Hello, {$name}!");
})->purpose('Greet a user by their name');