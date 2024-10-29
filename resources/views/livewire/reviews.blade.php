<div class="border-t border-background-accent-hover mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-8 sm:pt-6">
    <livewire:profile-header :$user />

    <x-profile-section class="mt-6 mb-20">
        <x-slot:title>Les critiques postés par {{ $user->username }}</x-slot:title>
        <x-slot:description>Parcourez toutes les critiques postés par <span class="font-medium">{{ $user->username }}</span>.</x-slot:description>
        <x-slot:button>
            <x-button type="secondary" class="mt-auto" href="{{ route('profile', $user->slug) }}">Retourner au profile</x-button>
        </x-slot:button>

        <div class="grid grid-cols-1 gap-x-6 lg:grid-cols-2 gap-y-6">
            @if($reviews->isEmpty())
                <div class="col-span-2">
                    <p class="text-2xl font-bold tracking-tight text-gray-300 text-center">Aucune critique postée.</p>
                </div>
            @endif

            @foreach($reviews as $review)
                <x-card.review class="pb-5 border-b border-background-accent-hover max-[315px]:flex-col" :profile="true" :$review/>
            @endforeach
        </div>

        {{ $reviews->links('pagination::tailwind') }}
    </x-profile-section>
</div>
