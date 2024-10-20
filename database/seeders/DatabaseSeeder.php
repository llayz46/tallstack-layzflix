<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'Test User',
            'slug' => 'test-user',
            'email' => 'test@test.fr',
            'password' => bcrypt('test'),
            'premium' => false,
        ]);

        User::factory(25)->create();

        User::factory()->create([
            'username' => 'John Doe',
            'slug' => 'john-doe',
            'email' => 'john@doe.fr',
            'password' => bcrypt('test'),
            'premium' => true,
        ]);

        $johnDoe = User::where('email', 'john@doe.fr')->first();
        $johnDoe->followers()->attach(1);
        $johnDoe->followers()->attach(range(4, 23));
    }
}
