<?php

namespace App\Livewire\Playlist;

use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    use InteractsWithBanner;

    #[Validate('required', message: 'Votre playlist doit avoir un nom.')]
    #[Validate('min:2', message: 'Votre playlist doit avoir un nom d\'au moins 2 caractères.')]
    #[Validate('max:100', message: 'Votre playlist doit avoir un nom de maximum 100 caractères.')]
    public string $name;

    public string $description;

    #[Validate('required', message: 'La visibilité de votre playlist doit être renseignée.')]
    #[Validate('boolean', message: 'La visibilité de votre playlist doit être un booléen.')]
    public bool $visibility = true;

    public function save()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate();

        auth()->user()->playlists()->create([
            'name' => $this->name,
            'description' => $this->description,
            'visibility' => $this->visibility,
        ]);

        $this->reset();

        $this->dispatch('playlistUpdated');

        $this->banner('Playlist créée avec succès !');
    }
}
