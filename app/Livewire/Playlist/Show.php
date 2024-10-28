<?php

namespace App\Livewire\Playlist;

use App\Models\Playlist;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public Playlist $playlist;
    public User $user;

    public function render()
    {
        $this->authorize('view', $this->playlist);

        return view('livewire.playlist.show', [
            'playlist' => $this->playlist,
            'medias' => $this->playlist->medias()->paginate(10),
        ])
            ->layout('layouts.app')
            ->title($this->user->username . ' - ' . $this->playlist->name . ' - LayzFlix');
    }
}
