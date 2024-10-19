<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Followers extends Component
{
    public ?Collection $followers;

    public User $selectedUser;

    public int $perPage = 10;

    public User $user;

    public function loadFollowers($user)
    {
        $this->followers = $user->followers->take($this->perPage);
    }

    public function mount(User $user)
    {
        $this->user = $user;

        $this->loadFollowers($user);

        $this->selectedUser = $this->followers->first();
    }


    public function selectUser(User $user)
    {
        $this->selectedUser = $user;
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
