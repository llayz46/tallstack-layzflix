<div class="border-t border-background-accent-hover mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-8 sm:pt-6">
    <div class="flex justify-between w-full">
        <div class="w-1/2">
            <div class="flex items-start space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16 rounded-full object-cover shadow-inner" src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://ui-avatars.com/api/?background=ebf4ff&name='. $user->username .'&color=d5294d&font-size=0.5&semibold=true&format=svg' }}" alt="">
                        <span class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="pt-1.5">
                    <h1 class="text-2xl font-bold text-white">{{ $user->username }}</h1>
                    <p class="text-sm font-medium text-neutral-400">{{ Str::ucfirst($user->biography) }}</p>
                </div>
            </div>
            <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-3 sm:space-y-0 sm:space-x-reverse" x-data="{ followersModal: false, followingsModal: false }" @keydown.escape="followersModal = false; followingsModal = false">
                @auth
                    @if(auth()->user()->isPremium())
                        <x-modal.followers :$user/>
                    @endif

                    <x-modal.followings :$user/>

                    @if($user->id !== auth()->user()->id)
                        <x-button class="cursor-not-allowed" type="secondary">Message</x-button>
                    @endif

                    @if($user->id === auth()->user()->id)
                        <x-button type="link" href="{{ route('settings.show') }}" wire:navigate>Modifier profile</x-button>

                        <x-button type="secondary-button" @click="followingsModal = true">Suivis</x-button>

                        @if(auth()->user()->isPremium())
                            <x-button type="secondary-button" @click="followersModal = true">Followers</x-button>
                        @endif
                    @else
                        @if(!auth()->user()->isFollowing($user))
                            <x-button type="button" wire:click="follow({{ $user->id }})">Follow</x-button>
                        @else
                            <x-button type="button" wire:click="unfollow({{ $user->id }})">Unfollow</x-button>
                        @endif
                    @endif
                @endauth

                @guest
                    <x-button type="link" href="{{ route('login') }}" type="secondary">Message</x-button>
                    <x-button type="link" href="{{ route('login') }}">Add friend</x-button>
                @endguest
            </div>
        </div>

        <div class="mt-3 w-1/3 text-end space-y-1">
            @if($user->isPremium())
                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset text-primary-600 bg-gradient-to-tr from-primary-500/10 to-primary-950/30 ring-rose-500/20">Premium</span>
            @endif

            <x-profile-level-badge :level="$user->level"/>

{{--            @if($numberOfMovies)--}}
            <x-profile-info-badge>54 Films et séries en favoris</x-profile-info-badge>
{{--                <x-badge tag="span">{{ $numberOfMovies }} Favorite movie/serie(s)</x-badge>--}}
{{--            @endif--}}

{{--            @if($numberOfReviews)--}}
            <x-profile-info-badge>33 Critiques publiées</x-profile-info-badge>
{{--                <x-badge tag="span">{{ $numberOfReviews }} Review(s)</x-badge>--}}
{{--            @endif--}}

{{--            @if($followers)--}}
            <x-profile-info-badge>7 Followers</x-profile-info-badge>
{{--                <x-badge tag="span">{{ $followers }} Follower(s)</x-badge>--}}
{{--            @endif--}}
        </div>
    </div>

    <x-profile-section class="mt-6">
        <x-slot:title>Films et séries préférés</x-slot:title>
        <x-slot:description>Les 5 derniers films favoris de <span class="font-medium">{{ $user->username }}</span></x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="#">Voir tout</x-button>
        </x-slot:button>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 md:grid-cols-5">
            <a href="https://layzflix.llayz.fr/medias/236235-tv-the-gentlemen" class="overflow-hidden rounded-lg bg-background border border-gray-200 dark:border-white/10 shadow group relative" data-turbo="false">
                <span class="sr-only">Link to The Gentlemen</span>
                <img src="https://image.tmdb.org/t/p/w500/tw3tzfXaSpmUZIB8ZNqNEGzMBCy.jpg" class="group-hover:opacity-35 transition-opacity h-full w-full" alt="Poster of : The Gentlemen" sizes="(max-width: 1300px) 300px" loading="lazy">
                <div class="hidden group-hover:block position absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <h3 class="text-lg font-semibold text-title text-center">The Gentlemen</h3>
                    <p class="mt-1 text-sm text-body">2024-03-07</p>
                </div>
            </a>
            <a href="https://layzflix.llayz.fr/medias/522627-movie-the-gentlemen" class="overflow-hidden rounded-lg bg-background border border-gray-200 dark:border-white/10 shadow group relative" data-turbo="false">
                <span class="sr-only">Link to The Gentlemen</span>
                <img src="https://image.tmdb.org/t/p/w500/jtrhTYB7xSrJxR1vusu99nvnZ1g.jpg" class="group-hover:opacity-35 transition-opacity h-full w-full" alt="Poster of : The Gentlemen" sizes="(max-width: 1300px) 300px" loading="lazy">
                <div class="hidden group-hover:block position absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <h3 class="text-lg font-semibold text-title text-center">The Gentlemen</h3>
                    <p class="mt-1 text-sm text-body">2020-01-01</p>
                </div>
            </a>
            <a href="https://layzflix.llayz.fr/medias/97951-tv-mayor-of-kingstown" class="overflow-hidden rounded-lg bg-background border border-gray-200 dark:border-white/10 shadow group relative" data-turbo="false">
                <span class="sr-only">Link to Mayor of Kingstown</span>
                <img src="https://image.tmdb.org/t/p/w500/bCoVQckqnqVtiAZua0EO17eI2Y1.jpg" class="group-hover:opacity-35 transition-opacity h-full w-full" alt="Poster of : Mayor of Kingstown" sizes="(max-width: 1300px) 300px" loading="lazy">
                <div class="hidden group-hover:block position absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <h3 class="text-lg font-semibold text-title text-center">Mayor of Kingstown</h3>
                    <p class="mt-1 text-sm text-body">2021-11-14</p>
                </div>
            </a>
            <a href="https://layzflix.llayz.fr/medias/799583-movie-the-ministry-of-ungentlemanly-warfare" class="overflow-hidden rounded-lg bg-background border border-gray-200 dark:border-white/10 shadow group relative" data-turbo="false">
                <span class="sr-only">Link to The Ministry of Ungentlemanly Warfare</span>
                <img src="https://image.tmdb.org/t/p/w500/8aF0iAKH9MJMYAZdi0Slg77RYa2.jpg" class="group-hover:opacity-35 transition-opacity h-full w-full" alt="Poster of : The Ministry of Ungentlemanly Warfare" sizes="(max-width: 1300px) 300px" loading="lazy">
                <div class="hidden group-hover:block position absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <h3 class="text-lg font-semibold text-title text-center">The Ministry of Ungentlemanly Warfare</h3>
                    <p class="mt-1 text-sm text-body">2024-04-18</p>
                </div>
            </a>
            <a href="https://layzflix.llayz.fr/medias/106379-tv-fallout" class="overflow-hidden rounded-lg bg-background border border-gray-200 dark:border-white/10 shadow group relative" data-turbo="false">
                <span class="sr-only">Link to Fallout</span>
                <img src="https://image.tmdb.org/t/p/w500/AnsSKR9LuK0T9bAOcPVA3PUvyWj.jpg" class="group-hover:opacity-35 transition-opacity h-full w-full" alt="Poster of : Fallout" sizes="(max-width: 1300px) 300px" loading="lazy">
                <div class="hidden group-hover:block position absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <h3 class="text-lg font-semibold text-title text-center">Fallout</h3>
                    <p class="mt-1 text-sm text-body">2024-04-10</p>
                </div>
            </a>
        </div>
    </x-profile-section>

    <x-profile-section class="mt-12">
        <x-slot:title>Critiques récentes</x-slot:title>
        <x-slot:description>Les 4 dernières critiques de <span class="font-medium">{{ $user->username }}</span></x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="#">Voir tout</x-button>
        </x-slot:button>
    </x-profile-section>
</div>
