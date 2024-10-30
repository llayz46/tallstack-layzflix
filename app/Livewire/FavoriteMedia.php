<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FavoriteMedia extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.favorite-media', [
            'mediaFavorites' => $this->user->favoriteMedias->sortByDesc('created_at')->paginate(10),
        ])
            ->layout('layouts.app')
            ->title($this->user->username . ' - ' . 'Favoris' . ' - LayzFlix');
    }
}
