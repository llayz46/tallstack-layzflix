<?php

use App\Http\Controllers\Browse;
use App\Livewire\Home;
use App\Livewire\Media\Show;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/{user:slug}/profile', Profile::class)->name('profile');

Route::get('/browse', Browse::class)->name('browse');

Route::get('/show/{id}-{type}-{slug}', Show::class)->name('show');

//Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

require __DIR__ . '/jetstream.php';
