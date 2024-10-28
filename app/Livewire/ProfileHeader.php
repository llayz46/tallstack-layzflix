<?php

namespace App\Livewire;

use App\Models\User;
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
}
