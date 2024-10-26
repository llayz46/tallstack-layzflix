<?php

namespace Database\Seeders;

use App\Models\Media;
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
        $testUser = User::factory()->create([
            'username' => 'Test User',
            'slug' => 'test-user',
            'email' => 'test@test.fr',
            'profile_photo_path' => null,
            'password' => bcrypt('test'),
            'premium' => false,
            'xp' => 600,
            'level' => 7,
        ]);

        $johnDoe = User::factory()->create([
            'username' => 'John Doe',
            'slug' => 'john-doe',
            'email' => 'john@doe.fr',
            'profile_photo_path' => null,
            'password' => bcrypt('test'),
            'premium' => true,
            'xp' => 800,
            'level' => 8,
        ]);

        User::factory(100)->create();

        $testUser->followers()->attach(2);
        $testUser->followers()->attach(range(3, 30));
        $testUser->following()->attach(2);
        $testUser->following()->attach(range(41, 56));

        $johnDoe->followers()->attach(1);
        $johnDoe->followers()->attach(range(31, 61));
        $johnDoe->following()->attach(1);
        $johnDoe->following()->attach(range(77, 94));

        $theGentlemenTV = Media::factory()->create([
            'media_id' => 236235,
            'media_type' => 'tv',
            'normalized_title' => 'The Gentlemen',
            'overview' => "Quand Eddie, un aristocrate, hérite du domaine familial, il y découvre un énorme empire de la beuh... Et les exploitants n'ont aucune intention de l'abandonner !",
            'poster_path' => '/wPBFN3r39ABf9amaCD0PB21TAlg.jpg',
            'release_date' => '2024-03-07',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        $theGentlemenMOVIE = Media::factory()->create([
            'media_id' => 522627,
            'media_type' => 'movie',
            'normalized_title' => 'The Gentlemen',
            'overview' => "Quand Mickey Pearson, baron de la drogue à Londres, laisse entendre qu’il pourrait se retirer du marché, il déclenche une guerre explosive : la capitale anglaise devient le théâtre de tous les chantages, complots, trahisons, corruptions et enlèvements… Dans cette jungle où l’on ne distingue plus ses alliés de ses ennemis, il n’y a de la place que pour un seul roi !",
            'poster_path' => '/yXaofuhSWYKS6MLCg0okqnXQMbS.jpg',
            'release_date' => '2020-01-01',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        $codeUncle = Media::factory()->create([
            'media_id' => 203801,
            'media_type' => 'movie',
            'normalized_title' => 'Agents très spéciaux : Code U.N.C.L.E.',
            'overview' => "Situé au début des années 60, en pleine guerre froide, The Man From U.N.C.L.E. s’attache au parcours de l’agent de la CIA Solo et à l’agent du KGB Kuryakin. Contraints de laisser de côté leur antagonisme ancestral, les deux hommes s’engagent dans une mission conjointe : mettre hors d’état de nuire une organisation criminelle internationale déterminée à ébranler le fragile équilibre mondial, en favorisant la prolifération des armes et de la technologie nucléaires. Pour l’heure, Solo et Kuryakin n’ont qu’une piste : le contact de la fille d’un scientifique allemand porté disparu, le seul à même d’infiltrer l’organisation criminelle. Ils se lancent dans une course contre la montre pour retrouver sa trace et empêcher un cataclysme planétaire.",
            'poster_path' => '/5FNGb0beZQBDMAVAe2Nyeb7ki6v.jpg',
            'release_date' => '2015-08-13',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        $testMedia = Media::factory()->create([
            'media_id' => 123456,
            'media_type' => 'movie',
            'normalized_title' => 'Test Movie',
            'overview' => 'Test Movie Overview',
            'poster_path' => null,
            'release_date' => '2018-06-13',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        $testUser->favoriteMedias()->attach($testMedia->id);
        $testUser->favoriteMedias()->attach($theGentlemenMOVIE->id);
        $testUser->reviews()->create([
            'rating' => 1,
            'content' => 'Lorem ipsum dolor sit amet labore et sed praesent duo et. Justo esse dolor nulla diam diam dolor iusto lorem est et lobortis gubergren diam in eos. Praesent vero esse tempor dolor autem vero lorem. Et wisi amet rebum et sit est. Stet volutpat dolor est. Amet nulla et voluptua tempor ea hendrerit vel elitr gubergren et diam nonumy sit sadipscing. Duo dolor duo eros lobortis at.',
            'media_id' => $testMedia->id,
        ]);
        $testUser->reviews()->create([
            'rating' => 5,
            'content' => 'Lorem ipsum dolor sit amet labore et sed praesent duo et. Justo esse dolor nulla diam diam dolor iusto lorem est et lobortis gubergren diam in eos. Praesent vero esse tempor dolor autem vero lorem. Et wisi amet rebum et sit est. Stet volutpat dolor est. Amet nulla et voluptua tempor ea hendrerit vel elitr gubergren et diam nonumy sit sadipscing. Duo dolor duo eros lobortis at.',
            'media_id' => $theGentlemenMOVIE->id,
        ]);
        $johnDoe->reviews()->create([
            'rating' => 5,
            'content' => 'Lorem ipsum dolor sit amet labore et sed praesent duo et. Justo esse dolor nulla diam diam dolor iusto lorem est et lobortis gubergren diam in eos. Praesent vero esse tempor dolor autem vero lorem. Et wisi amet rebum et sit est. Stet volutpat dolor est. Amet nulla et voluptua tempor ea hendrerit vel elitr gubergren et diam nonumy sit sadipscing. Duo dolor duo eros lobortis at.',
            'media_id' => $theGentlemenMOVIE->id,
        ]);
        $testUser->reviews()->create([
            'rating' => 4,
            'content' => 'Lorem ipsum dolor sit amet labore et sed praesent duo et. Justo esse dolor nulla diam diam dolor iusto lorem est et lobortis gubergren diam in eos. Praesent vero esse tempor dolor autem vero lorem. Et wisi amet rebum et sit est. Stet volutpat dolor est. Amet nulla et voluptua tempor ea hendrerit vel elitr gubergren et diam nonumy sit sadipscing. Duo dolor duo eros lobortis at.',
            'media_id' => $theGentlemenTV->id,
        ]);

        $johnDoe->favoriteMedias()->attach($theGentlemenTV->id);
        $johnDoe->favoriteMedias()->attach($theGentlemenMOVIE->id);
        $johnDoe->favoriteMedias()->attach($codeUncle->id);
        $johnDoe->reviews()->create([
            'rating' => 4,
            'content' => 'Lorem ipsum dolor sit amet labore et sed praesent duo et. Justo esse dolor nulla diam diam dolor iusto lorem est et lobortis gubergren diam in eos. Praesent vero esse tempor dolor autem vero lorem. Et wisi amet rebum et sit est. Stet volutpat dolor est. Amet nulla et voluptua tempor ea hendrerit vel elitr gubergren et diam nonumy sit sadipscing. Duo dolor duo eros lobortis at.',
            'media_id' => $theGentlemenTV->id,
        ]);
        $johnDoe->reviews()->create([
            'rating' => 4,
            'content' => 'Lorem ipsum dolor sit amet labore et sed praesent duo et. Justo esse dolor nulla diam diam dolor iusto lorem est et lobortis gubergren diam in eos. Praesent vero esse tempor dolor autem vero lorem. Et wisi amet rebum et sit est. Stet volutpat dolor est. Amet nulla et voluptua tempor ea hendrerit vel elitr gubergren et diam nonumy sit sadipscing. Duo dolor duo eros lobortis at.',
            'media_id' => $codeUncle->id,
        ]);
        $testUser->reviews()->create([

            'rating' => 2,
            'content' => 'Lorem ipsum dolor sit amet labore et sed praesent duo et. Justo esse dolor nulla diam diam dolor iusto lorem est et lobortis gubergren diam in eos. Praesent vero esse tempor dolor autem vero lorem. Et wisi amet rebum et sit est. Stet volutpat dolor est. Amet nulla et voluptua tempor ea hendrerit vel elitr gubergren et diam nonumy sit sadipscing. Duo dolor duo eros lobortis at.',
            'media_id' => $testMedia->id,
        ]);
    }
}
