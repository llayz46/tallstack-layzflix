<?php

namespace App\Livewire\Media;

use App\Facades\TmdbApiService;
use Livewire\Component;

class Show extends Component
{
    public $media;

    public function mount($id, $type)
    {
        $this->media = TmdbApiService::show($id, $type);
    }

    public function render()
    {
        return view('livewire.media.show')
            ->layout('layouts.app')
            ->title($this->media['normalized_title'] .' - LayzFlix');
    }
}
