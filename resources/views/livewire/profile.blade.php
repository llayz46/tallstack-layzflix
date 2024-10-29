<div class="border-t border-background-accent-hover mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-8 sm:pt-6">
    <livewire:profile-header :$user />

    <x-profile-section class="mt-6">
        <x-slot:title>Films et séries préférés</x-slot:title>
        <x-slot:description>Les {{ count($mediaFavorites) }} derniers films favoris de <span class="font-medium">{{ $user->username }}</span></x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="{{ route('favorite-media', $user->slug) }}">Voir tout</x-button>
        </x-slot:button>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-5">
            @foreach($mediaFavorites as $media)
                <x-card.media :$media/>
            @endforeach
        </div>
    </x-profile-section>

    <x-profile-section class="mt-12">
        <x-slot:title>Critiques récentes</x-slot:title>
        <x-slot:description>Les {{ count($reviews) }} dernières critiques de <span class="font-medium">{{ $user->username }}</span></x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="{{ route('reviews', $user->slug) }}">Voir tout</x-button>
        </x-slot:button>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 lg:grid-cols-2">
            @foreach($reviews as $review)
                <x-card.review class="pb-5 border-b border-background-accent-hover max-sm:flex-col" :profile="true" :$review/>
            @endforeach
        </div>
    </x-profile-section>

    <x-profile-section class="mt-12 mb-20">
        <x-slot:title>Les dernières playlists</x-slot:title>
        <x-slot:description>Les {{ count($user->playlists) > 2 ? '2' : count($user->playlists) }} dernières playlists de <span class="font-medium">{{ $user->username }}</span></x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="{{ route('playlists', $user->slug) }}">Voir tout</x-button>
        </x-slot:button>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 lg:grid-cols-2">
            @auth
                @if(auth()->user()->is($user))
                    @foreach($user->playlists->sortByDesc('created_at')->take(2) as $playlist)
                        <x-card.playlist :$playlist :$user/>
                    @endforeach
                @else
                    @foreach($user->playlists->sortByDesc('created_at')->where('visibility', true)->take(2) as $playlist)
                        <x-card.playlist :$playlist :$user/>
                    @endforeach
                @endif
            @else
                @foreach($user->playlists->sortByDesc('created_at')->where('visibility', true)->take(2) as $playlist)
                    <x-card.playlist :$playlist :$user/>
                @endforeach
            @endauth
        </div>
    </x-profile-section>
</div>
