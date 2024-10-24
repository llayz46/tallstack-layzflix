<?php

namespace App\Livewire\Media;

use App\Facades\TmdbApiService;
use App\Models\Media;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Show extends Component
{
    use InteractsWithBanner;

    public array $media;
    public bool $isFavorite = false;
    public int $favoriteCount;

    public function mount($id, $type)
    {
        $this->media = TmdbApiService::show($id, $type);
        $this->countFavorites();
        $this->checkIfFavorite();
    }

    public function checkIfFavorite()
    {
        $this->isFavorite = auth()->user()->favoriteMedias->contains('media_id', $this->media['id']);
    }

    public function countFavorites()
    {
        $media = Media::where('media_id', $this->media['id'])->first();

        if ($media) {
            $this->favoriteCount = $media->favoritedByUsers()->count();
        } else {
            $this->favoriteCount = 0;
        }
    }

    public function favorite($id, $type, $title, $overview)
    {
        $user = auth()->user();

        $media = Media::firstOrCreate([
            'media_id' => $id,
            'media_type' => $type,
            'normalized_title' => $title,
            'overview' => $overview,
        ]);

        if ($user->favoriteMedias->contains('media_id', $media->media_id)) {
            $user->favoriteMedias()->detach($media->id);
            $this->isFavorite = false;
            $this->countFavorites();

            $this->banner($type === 'movie' ? 'Film retiré des favoris' : 'Série retirée des favoris');
        } else {
            $user->favoriteMedias()->attach($media->id);
            $this->isFavorite = true;
            $this->countFavorites();

            $this->banner($type === 'movie' ? 'Film ajouté aux favoris' : 'Série ajoutée aux favoris');
        }
    }

    public function render()
    {
        return view('livewire.media.show')
            ->layout('layouts.app')
            ->title($this->media['normalized_title'] .' - LayzFlix');
    }
}
