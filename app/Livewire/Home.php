<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Accueil - LayzFlix')]
#[Layout('layouts.app')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}
