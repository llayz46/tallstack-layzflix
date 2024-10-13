<?php

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
