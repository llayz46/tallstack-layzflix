<?php

namespace App\Livewire\Playlist;

use App\Models\Playlist;
use App\Models\User;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Browse extends Component
{
    use InteractsWithBanner;

    public User $user;

    public function deletePlaylist(Playlist $playlist)
    {
        $this->authorize('delete', $playlist);

        $playlist->delete();

        $this->banner('La playlist a bien été supprimée.');
    }

    public function updateVisibility(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        $playlist->update([
            'visibility' => !$playlist->visibility,
        ]);
    }

    public function render()
    {
        if(auth()->check()) {
            if (auth()->user()->is($this->user)) {
                $playlists = $this->user->playlists()->paginate(8);
            } else {
                $playlists = $this->user->playlists()->where('visibility', true)->paginate(8);
            }
        } else {
            $playlists = $this->user->playlists()->where('visibility', true)->paginate(8);
        }

        return view('livewire.playlist.browse', [
            'playlists' => $playlists,
        ])
            ->layout('layouts.app')
            ->title($this->user->username . ' - ' . 'Playlists' . ' - LayzFlix');
    }
}
