<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Reviews extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.reviews', [
            'reviews' => $this->user->reviews()->paginate(10),
        ])
            ->layout('layouts.app')
            ->title($this->user->username . ' - ' . 'Critiques' . ' - LayzFlix');
    }
}
