<?php

namespace App\Livewire;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Profile extends Component
{
    use InteractsWithBanner;

    public User $user;
    public int $mediaFavoritesCount;
    public array $mediaFavorites;
    public int $reviewsCount;
    public array $reviews;
    public int $followers;

    public function mount(User $user): void
    {
        $this->user = $user;

        $this->mediaFavoritesCount = $user->favoriteMedias->count();
        $this->mediaFavorites = $user->favoriteMedias->sortByDesc('created_at')->take(5)->toArray();

        $this->reviewsCount = $user->reviews->count();
        $this->reviews = $user->reviews->sortByDesc('created_at')->take(4)->load('media')->toArray();

        $this->followers = $user->followers()->count();
    }

    public function deletePlaylist(Playlist $playlist)
    {
        $this->authorize('delete', $playlist);

        $playlist->delete();

        $this->banner('La playlist a bien été supprimée.');
    }

    public function updateVisibility(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        $playlist->update([
            'visibility' => !$playlist->visibility,
        ]);
    }

    public function render(): View
    {
        return view('livewire.profile')
            ->layout('layouts.app')
            ->title($this->user->username . ' - LayzFlix');
    }
}
