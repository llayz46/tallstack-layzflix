<?php

namespace App\Livewire\Media;

use App\Facades\TmdbApiService;
use App\Models\Media;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Show extends Component
{
    public array $media;
    public bool $isFavorite = false;

    public function mount($id, $type)
    {
        $this->media = TmdbApiService::show($id, $type);
        $this->checkIfFavorite();
    }

    public function checkIfFavorite()
    {
        $this->isFavorite = auth()->user()->favoriteMedias->contains('media_id', $this->media['id']);
    }

    public function favorite($id, $type, $title, $overview)
    {
        $user = auth()->user();

        $media = Media::firstOrCreate([
            'media_id' => $id,
            'media_type' => $type,
            'title' => $title,
            'overview' => $overview,
        ]);

        if ($user->favoriteMedias->contains('media_id', $media->media_id)) {
            $user->favoriteMedias()->detach($media->id);
            $this->isFavorite = false;
        } else {
            $user->favoriteMedias()->attach($media->id);
            $this->isFavorite = true;
        }

        // TOGGLE LA BANNIERE DE SUCCES
    }

    public function render()
    {
        return view('livewire.media.show')
            ->layout('layouts.app')
            ->title($this->media['normalized_title'] .' - LayzFlix');
    }
}
