<?php

use App\Livewire\Browse;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Browse::class)
        ->assertStatus(200);
});
