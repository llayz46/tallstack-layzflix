<?php

namespace App\Livewire\Playlist;

use App\Models\Media;
use App\Models\Playlist;
use App\Models\User;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use InteractsWithBanner;
    use WithPagination;

    public Playlist $playlist;
    public User $user;

    public function delete(Media $media)
    {
        $this->authorize('delete', $this->playlist);

        $this->playlist->medias()->detach($media->id);

        $this->banner($media->normalized_title . ' à bien été retiré de la playlist');
    }

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
