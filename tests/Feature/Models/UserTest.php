<?php

use App\Models\Media;
use App\Models\User;

it('can create a user', function () {
    $user = User::factory()->create();

    expect($user->id)->toBeInt()
        ->and($user->username)->toBeString()
        ->and($user->email)->toBeString()
        ->and($user->password)->toBeString();
});

it('can create a user with a specific username', function () {
    $user = User::factory()->create([
        'username' => 'Test User',
    ]);

    expect($user->username)->toBe('Test User');
});

it('can have a slug', function () {
    $user = User::factory()->create();

    $username = $user->username;

    expect($user->slug)->toBe(\Illuminate\Support\Str::slug($username));
});

it('can create a user with a specific email', function () {
    $user = User::factory()->create([
        'email' => 'test@test.fr',
    ]);

    expect($user->email)->toBe('test@test.fr');
});

it('can create a user with a specific password', function () {
    $user = User::factory()->create([
        'password' => bcrypt('test'),
    ]);

    expect($user->password)->toBeString();
});

it('can find user by email', function () {
    $user = User::factory()->create([
        'email' => 'test@test.fr',
    ]);

    $foundUser = User::where('email', 'test@test.fr')->first();

    expect($foundUser->email)->toBe('test@test.fr');
});

it('can find user by username', function () {
    $user = User::factory()->create([
        'username' => 'test',
    ]);

    $foundUser = User::where('username', 'test')->first();

    expect($foundUser->username)->toBe('test');
});

it('can find user by id', function () {
    $user = User::factory()->create();

    $foundUser = User::find($user->id);

    expect($foundUser->id)->toBe($user->id);
});

it('can update user', function () {
    $user = User::factory()->create();

    $user->update([
        'username' => 'Test User',
        'email' => 'test@test.fr',
        'password' => bcrypt('test'),
    ]);

    expect($user->username)->toBe('Test User')
        ->and($user->email)->toBe('test@test.fr')
        ->and($user->password)->toBeString();
});

it('can delete user', function () {
    $user = User::factory()->create();

    $user->delete();

    expect(User::find($user->id))->toBeNull();
});

it('can have a profile photo', function () {
    $user = User::factory()->create();

    expect($user->profile_photo_url)->toBeString();
});

it('can update user profile photo', function () {
    $user = User::factory()->create([
        'profile_photo_path' => 'old-photo.jpg',
    ]);

    $user->update([
        'profile_photo_path' => 'new-photo.jpg',
    ]);

    expect($user->profile_photo_path)->toBe('new-photo.jpg');
});

it('can delete user profile photo', function () {
    $user = User::factory()->create([
        'profile_photo_path' => 'old-photo.jpg',
    ]);

    $user->update([
        'profile_photo_path' => null,
    ]);

    expect($user->profile_photo_path)->toBeNull();
});

it('can have a media in favorites', function () {
    $user = User::factory()->create();
    $media = Media::create([
        'media_id' => 1,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie',
        'overview' => 'Test Movie Overview',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);

    $user->favoriteMedias()->attach($media->id);

    expect($user->favoriteMedias->first()->id)->toBe($media->id);
});

it('can have multiple medias in favorites', function () {
    $user = User::factory()->create();
    $media1 = Media::create([
        'media_id' => 1,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie',
        'overview' => 'Test Movie Overview',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);
    $media2 = Media::create([
        'media_id' => 2,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie 2',
        'overview' => 'Test Movie Overview 2',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);

    $user->favoriteMedias()->attach($media1->id);
    $user->favoriteMedias()->attach($media2->id);

    expect($user->favoriteMedias->count())->toBe(2);
});

it('can remove a media from favorites', function () {
    $user = User::factory()->create();
    $media = Media::create([
        'media_id' => 1,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie',
        'overview' => 'Test Movie Overview',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);

    $user->favoriteMedias()->attach($media->id);
    $user->favoriteMedias()->detach($media->id);

    expect($user->favoriteMedias->count())->toBe(0);
});

it('can find user favorites medias informations', function () {
    $user = User::factory()->create();
    $media1 = Media::create([
        'media_id' => 1,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie',
        'overview' => 'Test Movie Overview',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);
    $media2 = Media::create([
        'media_id' => 2,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie 2',
        'overview' => 'Test Movie Overview 2',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);

    $user->favoriteMedias()->attach($media1->id);
    $user->favoriteMedias()->attach($media2->id);

    $favorites = $user->favoriteMedias;

    expect($favorites->first()->id)->toBe($media1->id)
        ->and($favorites->first()->media_type)->toBe($media1->media_type)
        ->and($favorites->last()->id)->toBe($media2->id)
        ->and($favorites->last()->media_type)->toBe($media2->media_type);
});

it('can find specific user favorite media informations', function () {
    $user = User::factory()->create();
    $media1 = Media::create([
        'media_id' => 1,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie',
        'overview' => 'Test Movie Overview',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);
    $media2 = Media::create([
        'media_id' => 2,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie 2',
        'overview' => 'Test Movie Overview 2',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);

    $user->favoriteMedias()->attach($media1->id);
    $user->favoriteMedias()->attach($media2->id);

    $favorites = $user->favoriteMedias;

    $favoriteMedia = $favorites->where('id', 1)->first();

    expect($favoriteMedia->id)->toBe($media1->id)
        ->and($favoriteMedia->media_type)->toBe($media1->media_type);
});

it('can have many playlists', function () {
    $user = User::factory()->create();

    $user->playlists()->create([
        'name' => 'Test Playlist',
        'description' => 'Test Playlist Description',
        'visibility' => true,
    ]);

    expect($user->playlists->count())->toBe(1);
});

it('can be premium', function () {
    $user = User::factory()->create([
        'premium' => true,
    ]);

    expect($user->premium)->toBeTrue();
});

it('can be not premium', function () {
    $user = User::factory()->create([
        'premium' => false,
    ]);

    expect($user->premium)->toBeFalse();
});

it('can check if user is premium', function () {
    $user = User::factory()->create([
        'premium' => true,
    ]);

    expect($user->isPremium())->toBeTrue();
});

it('can have xp', function () {
    $user = User::factory()->create([
        'xp' => 1050,
    ]);

    expect($user->xp)->toBe(1050);
});

it('can have a level', function () {
    $user = User::factory()->create([
        'xp' => 1050,
        'level' => 9,
    ]);

    expect($user->level)->toBe(9);
});

it('can follow another user', function () {
    $user = User::factory()->create();
    $userToFollow = User::factory()->create();

    $user->following()->attach($userToFollow->id);

    expect($user->following->first()->id)->toBe($userToFollow->id);
});

it('can have follower', function () {
    $user = User::factory()->create();
    $follower = User::factory()->create();

    $follower->following()->attach($user->id);

    expect($user->followers->first()->id)->toBe($follower->id);
});

it('can have many followers', function () {
    $user = User::factory()->create();
    $follower1 = User::factory()->create();
    $follower2 = User::factory()->create();

    $follower1->following()->attach($user->id);
    $follower2->following()->attach($user->id);

    expect($user->followers->count())->toBe(2);
});

it('can have many following', function () {
    $user = User::factory()->create();
    $following1 = User::factory()->create();
    $following2 = User::factory()->create();

    $user->following()->attach($following1->id);
    $user->following()->attach($following2->id);

    expect($user->following->count())->toBe(2);
});

it('can check if an specific user is following', function () {
    $user = User::factory()->create();
    $userToFollow = User::factory()->create();

    $user->following()->attach($userToFollow);

    expect($user->isFollowing($userToFollow))->toBeTrue();
});

it('can have many reviews', function () {
    $user = User::factory()->create();
    $media = Media::create([
        'media_id' => 1,
        'media_type' => 'movie',
        'normalized_title' => 'Test Movie',
        'overview' => 'Test Movie Overview',
        'poster_path' => '/poster',
        'release_date' => NOW()
    ]);

    $user->reviews()->create([
        'rating' => 5,
        'content' => 'Test review',
        'media_id' => $media->id,
    ]);

    expect($user->reviews->count())->toBe(1);
});
