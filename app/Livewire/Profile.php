<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.profile')
            ->layout('layouts.app')
            ->title(auth()->user()->username . ' - LayzFlix');
    }
}
