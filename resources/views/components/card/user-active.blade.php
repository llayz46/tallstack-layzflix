@props(['user'])

<div class="flex sm:justify-center gap-4">
    <a href="{{ route('profile', $user->slug) }}">
        <img class="hover:scale-105 object-cover transition min-w-20 min-h-20 size-20 rounded-full border border-background-accent" src="{{ $user->getProfilePhoto() }}" alt="Image de profile">
    </a>
    <div class="text-neutral-400 space-y-0.5">
        <p class="font-semibold text-gray-300">{{ $user->username }}</p>
        <p>{{ $user->biography }}</p>
        <p>{{ $user->total_reviews }} avis postés</p>
    </div>
</div>
