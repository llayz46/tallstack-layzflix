<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileHeader extends Component
{
    public User $user;
    public int $mediaFavoritesCount;
    public int $reviewsCount;
    public int $followers;

    public function mount(User $user): void
    {
        $this->user = $user;

        $this->mediaFavoritesCount = $user->favoriteMedias->count();

        $this->reviewsCount = $user->reviews->count();

        $this->followers = $user->followers()->count();
    }

    public function follow(User $user): void
    {
        if (Auth::user()->is($user)) {
            $this->dangerBanner('Vous ne pouvez pas vous suivre vous-même.');
            return;
        }

        Auth::user()->following()->attach($user);
    }

    public function unfollow(User $user): void
    {
        Auth::user()->following()->detach($user);
    }
}
