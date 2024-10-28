<div class="border-t border-background-accent-hover mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-8 sm:pt-6">
    <div class="flex justify-between w-full">
        <div class="w-1/2">
            <div class="flex items-start space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16 rounded-full object-cover shadow-inner" src="{{ $user->getProfilePhoto() }}" alt="">
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
                        <x-button type="link" href="{{ route('settings.show') }}" class="justify-center" wire:navigate>Modifier profile</x-button>

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

            @if($mediaFavoritesCount)
                <x-profile-info-badge>{{ $mediaFavoritesCount }} Films et séries en favoris</x-profile-info-badge>
            @endif

            @if($reviewsCount)
                <x-profile-info-badge>{{ $reviewsCount }} Critiques publiées</x-profile-info-badge>
            @endif

            @if($followers)
                <x-profile-info-badge>{{ $followers }} Followers</x-profile-info-badge>
            @endif
        </div>
    </div>

    <x-profile-section class="mt-6">
        <x-slot:title>Films et séries préférés</x-slot:title>
        <x-slot:description>Les {{ count($mediaFavorites) }} derniers films favoris de <span class="font-medium">{{ $user->username }}</span></x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="#">Voir tout</x-button>
        </x-slot:button>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-5">
            @foreach($mediaFavorites as $media)
                <x-card.media :$media/>
            @endforeach
        </div>
    </x-profile-section>

    <x-profile-section class="mt-12">
        <x-slot:title>Critiques récentes</x-slot:title>
        <x-slot:description>Les 4 dernières critiques de <span class="font-medium">{{ $user->username }}</span></x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="#">Voir tout</x-button>
        </x-slot:button>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 lg:grid-cols-2">
            @foreach($reviews as $review)
                <x-card.review class="pb-5 border-b border-background-accent-hover max-[315px]:flex-col" :profile="true" :$review/>
            @endforeach
        </div>
    </x-profile-section>

    <x-profile-section class="mt-12 mb-20">
        <x-slot:title>Les dernières playlists</x-slot:title>
        <x-slot:description>Les 2 dernières playlists de <span class="font-medium">{{ $user->username }}</span></x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="#">Voir tout</x-button>
        </x-slot:button>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 lg:grid-cols-2">
            @foreach($user->playlists->sortByDesc('created_at')->take(2) as $playlist)
                <x-card.playlist :$playlist :$user/>
            @endforeach
        </div>
    </x-profile-section>
</div>
