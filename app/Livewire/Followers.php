<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Followers extends Component
{
    public ?Collection $followers;

    public int $perPage = 10;

    public User $user;

    private function loadFollowers($user)
    {
        $followers = $user->followers
            ->map(function ($follower) {
            $follower->profile_photo_path = $follower->getProfilePhoto();
            $follower->is_following = Auth::user()->isFollowing($follower);
            return $follower;
        });

        $this->followers = $followers->take($this->perPage);
    }

    public function mount(User $user)
    {
        $this->user = $user;

        $this->loadFollowers($user);
    }

    public function loadMore() {
        $this->perPage += 10;
        $this->loadFollowers($this->user);
    }

    public function follow(User $user)
    {
        Auth::user()->following()->attach($user);
    }

    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user);
    }

    public function render()
    {
        return view('livewire.followers');
    }
}
