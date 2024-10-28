<div class="border-t border-background-accent-hover mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-8 sm:pt-6">
    <livewire:profile-header :$user />

    <x-profile-section class="mt-6 mb-20">
        <x-slot:title>Playlist : {{ $playlist->name }}</x-slot:title>
        <x-slot:description>Parcourez tous les films et séries de la playlist "<span class="font-medium">{{ $playlist->name }}</span>".</x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="{{ route('profile', $user->slug) }}">Retourner au profile</x-button>
        </x-slot:button>

        <div class="grid gap-x-6 gap-y-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-5">
            @if($medias->isEmpty())
                <div class="col-span-5">
                    <p class="text-2xl font-bold tracking-tight text-gray-300 text-center">Aucun film ou série dans cette playlist.</p>
                </div>
            @endif

            @foreach($medias as $media)
                <div class="flex flex-col gap-4" wire:key="{{ $media->id }}">
                    <x-card.media :$media/>
                    <x-button>Supprimer</x-button>
                </div>
            @endforeach
        </div>

        {{ $medias->links('pagination::tailwind') }}
    </x-profile-section>
</div>
