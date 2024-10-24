<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public User $user;
    public int $mediaFavoritesCount;
    public array $mediaFavorites;
    public int $followers;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->mediaFavoritesCount = $user->favoriteMedias->count();
        $this->followers = $user->followers()->count();
        $this->mediaFavorites = $user->favoriteMedias->take(5)->toArray();
    }

    public function follow(User $user)
    {
        if (Auth::user()->is($user)) {
            return;
        }

        Auth::user()->following()->attach($user);
    }

    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user);
    }

    public function render()
    {
        return view('livewire.profile')
            ->layout('layouts.app')
            ->title($this->user->username . ' - LayzFlix');
    }
}
