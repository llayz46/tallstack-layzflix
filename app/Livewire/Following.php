<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Following extends Component
{
    public ?Collection $followings;

    public int $perPage = 10;

    public User $user;

    public string $search = '';

    public function loadFollowings($user)
    {
        $this->followings = $user->following()
            ->when($this->search, function($query) {
                $query->where('username', 'like', '%' . $this->search . '%');
            })
            ->take($this->perPage)
            ->get();
    }

    public function updatedSearch()
    {
        $this->loadFollowings($this->user);
    }

    public function mount(User $user)
    {
        $this->user = $user;

        $this->loadFollowings($user);
    }

    public function loadMore() {
        $this->perPage += 10;
        $this->loadFollowings($this->user);
    }

    public function render()
    {
        return view('livewire.following');
    }
}
