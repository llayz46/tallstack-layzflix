<?php

use App\Http\Controllers\BrowseController;
use App\Livewire\FavoriteMedia;
use App\Livewire\Home;
use App\Livewire\Media\Show;
use App\Livewire\Profile;
use App\Livewire\Reviews;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/{user:slug}/profile', Profile::class)->name('profile');
Route::get('/{user:slug}/playlist/{playlist}', \App\Livewire\Playlist\Show::class)->name('playlist');
Route::get('/{user:slug}/medias', FavoriteMedia::class)->name('favorite-media');
Route::get('/{user:slug}/reviews', Reviews::class)->name('reviews');

Route::get('/browse', [BrowseController::class, 'search'])->name('browse');

Route::get('/browse/directors/{id}-{slug}', [BrowseController::class, 'person'])->name('directors');

Route::get('/show/{id}-{type}-{slug}', Show::class)->name('show');

//Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

require __DIR__ . '/jetstream.php';
