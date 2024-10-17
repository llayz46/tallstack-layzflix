<?php

use App\Models\Media;
use App\Models\Playlist;

it('can create a playlist', function () {
    $playlist = Playlist::factory()->create();

    expect($playlist->id)->toBeInt()
        ->and($playlist->name)->toBeString()
        ->and($playlist->description)->toBeString();
});

it('can create a playlist with a specific name', function () {
    $playlist = Playlist::factory()->create([
        'name' => 'Test Playlist',
    ]);

    expect($playlist->name)->toBe('Test Playlist');
});

it('can create a playlist with a specific description', function () {
    $playlist = Playlist::factory()->create([
        'description' => 'Test description',
    ]);

    expect($playlist->description)->toBe('Test description');
});

it('can find playlist by name', function () {
    $playlist = Playlist::factory()->create([
        'name' => 'Test Playlist',
    ]);

    $foundPlaylist = Playlist::where('name', 'Test Playlist')->first();

    expect($foundPlaylist->name)->toBe('Test Playlist');
});

it('can add medias to playlist', function () {
    $playlist = Playlist::factory()->create();
    $media = Media::create([
        'media_id' => 1,
        'media_type' => 'movie',
    ]);
    $media2 = Media::create([
        'media_id' => 10,
        'media_type' => 'movie',
    ]);

    $playlist->medias()->attach($media->id);
    $playlist->medias()->attach($media2->id);

    expect($playlist->medias->first()->id)->toBe($media->id)
        ->and($playlist->medias->last()->id)->toBe($media2->id);
});

it('can remove media from playlist', function () {
    $playlist = Playlist::factory()->create();
    $media = Media::create([
        'media_id' => 1,
        'media_type' => 'movie',
    ]);

    $playlist->medias()->attach($media->id);
    $playlist->medias()->detach($media->id);

    expect($playlist->medias->count())->toBe(0);
});
