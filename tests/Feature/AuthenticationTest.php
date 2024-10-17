<?php

use App\Models\User;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create([
        'password' => Hash::make('Password1.'),
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'Password1.',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('settings.show', absolute: false));
});

test('users cannot authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
