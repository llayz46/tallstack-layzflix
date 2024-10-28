<?php

namespace App\Livewire\Playlist;

use App\Models\Media;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Add extends Component
{
    use InteractsWithBanner;

    public Collection $playlists;
    public $playlist;
    public array $media;

    public function mount(array $media)
    {
        $this->playlists = auth()->user()->playlists;

        $this->media = $media;
    }

    public function save()
    {
        if (!auth()->check()) {
            $this->dangerBanner('Vous devez être connecté pour laisser un avis.');
        }

        $media = Media::firstOrCreate([
            'media_id' => $this->media['id'],
            'media_type' => $this->media['media_type'],
            'normalized_title' => $this->media['normalized_title'],
            'overview' => $this->media['overview'],
            'poster_path' => $this->media['poster_path'],
            'release_date' => $this->media['release_date'],
        ]);

        $playlist = auth()->user()->playlists()->where('id', $this->playlist)->first();

        if (!$playlist) {
            $this->dangerBanner('La playlist n\'existe pas.');
            return;
        }

        if($playlist->medias->contains($media->id)) {
            $this->dangerBanner('Ce média est déjà dans la playlist.');
            return;
        }

        $playlist->medias()->attach($media->id);

        auth()->user()->addXp(20);

        $this->banner($media->normalized_title . ' a bien été ajouté à la playlist ' . $playlist->name . ' !');
    }
}
