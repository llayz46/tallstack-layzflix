<?php

namespace App\Livewire;

use Livewire\Component;

class PlaylistDrawer extends Component
{
    public array $media;

    public function mount(array $media)
    {
        $this->media = $media;
    }
}
