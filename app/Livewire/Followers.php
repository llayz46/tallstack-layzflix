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

    public string $search = '';

    public function loadFollowers($user)
    {
        $this->followers = $user->followers()
            ->when($this->search, function($query) {
                $query->where('username', 'like', '%' . $this->search . '%');
            })
            ->take($this->perPage)
            ->get();
    }

    public function updatedSearch()
    {
        $this->loadFollowers($this->user);
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

    public function render()
    {
        return view('livewire.followers');
    }
}
