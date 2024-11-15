<div class="border-t border-background-accent-hover mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-8 sm:pt-6">
    <livewire:profile-header :$user />

    <x-profile-section class="mt-6 mb-20">
        <x-slot:title>Playlist : {{ $playlist->name }}</x-slot:title>
        <x-slot:description>Parcourez tous les films et séries de la playlist "<span class="font-medium">{{ $playlist->name }}</span>".</x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="{{ route('profile', $user->slug) }}">Retourner au profile</x-button>
        </x-slot:button>

        <div class="flex items-center justify-between mb-5">
            <div class="relative inline-block text-left" x-data="{ filterBy: false }">
                <div>
                    <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-300 hover:text-white"
                            aria-expanded="false" aria-haspopup="true" @click="filterBy = ! filterBy">
                        Filtrer par
                        <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-300 group-hover:text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div class="absolute left-0 z-30 mt-2 w-40 origin-top-left rounded-md bg-background-accent shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                     role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button" tabindex="-1"
                     x-show="filterBy"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95" x-cloak>
                    <div class="py-1" role="none">
                        <form wire:submit.prevent="filtering('popular')" method="post">
                            <button type="submit" class="block px-4 py-2 text-sm font-medium text-gray-300 hover:bg-background-accent-hover w-full text-start" role="menuitem" tabindex="-1">Les plus populaires</button>
                        </form>
                        <form wire:submit.prevent="filtering('rating')" method="post">
                            <button type="submit" class="block px-4 py-2 text-sm font-medium text-gray-300 hover:bg-background-accent-hover w-full text-start" role="menuitem" tabindex="-1">Les mieux notés</button>
                        </form>
                        <form wire:submit.prevent="filtering('release_date')" method="post">
                            <button type="submit" class="block px-4 py-2 text-sm font-medium text-gray-300 hover:bg-background-accent-hover w-full text-start" role="menuitem" tabindex="-1">Les plus récents</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-5">
            @if($medias->isEmpty())
                <div class="col-span-5">
                    <p class="text-2xl font-bold tracking-tight text-gray-300 text-center">Aucun film ou série dans cette playlist.</p>
                </div>
            @endif

            @foreach($medias as $media)
                <div class="flex flex-col gap-4" wire:key="{{ $media->id }}">
                    <x-card.media :$media/>
                    @auth
                        @if($playlist->user->id === auth()->user()->id)
                            <x-button wire:click="delete({{ $media->id }})">Supprimer</x-button>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>

        {{ $medias->links('pagination::tailwind') }}
    </x-profile-section>
</div>
