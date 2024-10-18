<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
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
        return view('livewire.profile')
            ->layout('layouts.app')
            ->title($this->user->username . ' - LayzFlix');
    }
}
