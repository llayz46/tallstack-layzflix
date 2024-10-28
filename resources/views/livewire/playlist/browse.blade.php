<div class="border-t border-background-accent-hover mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-8 sm:pt-6">
    @persist('profile-header')
        <livewire:profile-header :$user />
    @endpersist

    <x-profile-section class="mt-6 mb-20">
        <x-slot:title>Les playlists de {{ $user->username }}</x-slot:title>
        <x-slot:description>Parcourez toutes les playlists de <span class="font-medium">{{ $user->username }}</span>.</x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="{{ route('profile', $user->slug) }}">Retourner au profile</x-button>
        </x-slot:button>

        <ul class="grid grid-cols-1 gap-x-6 lg:grid-cols-2 gap-y-6">
            @if($playlists->isEmpty())
                <li class="col-span-2">
                    <p class="text-2xl font-bold tracking-tight text-gray-300 text-center">Aucune playlist.</p>
                </li>
            @endif

            @foreach($playlists as $playlist)
                <x-card.playlist :$playlist :$user/>
            @endforeach
        </ul>
    </x-profile-section>
</div>
