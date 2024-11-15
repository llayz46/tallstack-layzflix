<?php

namespace App\Livewire\Playlist;

use App\Models\Media;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Support\Collection;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use InteractsWithBanner;
    use WithPagination;

    public Playlist $playlist;
    public User $user;
    public string $filter = '';

    public function delete(Media $media)
    {
        $this->authorize('delete', $this->playlist);

        $this->playlist->medias()->detach($media->id);

        $this->banner($media->normalized_title . ' à bien été retiré de la playlist');
    }

    public function filtering($filter)
    {
        $this->filter = $filter;
    }

    public function updatedFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->authorize('view', $this->playlist);

        $medias = $this->playlist->medias();

        if(!empty($this->filter)) {
            if($this->filter === 'release_date') {
                $medias = $medias->orderBy('release_date', 'desc');
            } elseif($this->filter === 'popular') {
                $medias = $medias->withCount('reviews')
                    ->get()
                    ->sortByDesc('reviews_count');
            } elseif($this->filter === 'rating') {
                $medias = $medias->withCount('reviews')
                    ->with('reviews')
                    ->get()
                    ->sortByDesc(function($media) {
                        return [
                            $media->reviews->avg('rating'),
                            $media->reviews_count
                        ];
                    });
            }
        }

        return view('livewire.playlist.show', [
            'playlist' => $this->playlist,
            'medias' => $medias->paginate(10),
        ])
            ->layout('layouts.app')
            ->title($this->user->username . ' - ' . $this->playlist->name . ' - LayzFlix');
    }
}
