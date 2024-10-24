<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Profile extends Component
{
    public User $user;
    public int $mediaFavoritesCount;
    public array $mediaFavorites;
    public int $followers;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->mediaFavoritesCount = $user->favoriteMedias->count();
        $this->followers = $user->followers()->count();
        $this->mediaFavorites = $user->favoriteMedias->take(5)->toArray();
    }

    public function follow(User $user): void
    {
        if (Auth::user()->is($user)) {
            return;
        }

        Auth::user()->following()->attach($user);
    }

    public function unfollow(User $user): void
    {
        Auth::user()->following()->detach($user);
    }

    public function render(): View
    {
        return view('livewire.profile')
            ->layout('layouts.app')
            ->title($this->user->username . ' - LayzFlix');
    }
}
