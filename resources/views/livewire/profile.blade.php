<div class="border-t border-background-accent-hover mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-8 sm:pt-6">
    <div class="flex justify-center min-[420px]:justify-between">
        <div>
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
            <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-3 sm:space-y-0 sm:space-x-reverse">
                @auth
                    @if($user->id !== auth()->user()->id)
                        <x-button class="cursor-not-allowed" type="secondary">Message</x-button>
                    @endif

                    @if($user->id === auth()->user()->id)
                        <x-button type="link" href="{{ route('settings.show') }}" wire:navigate>Edit profile</x-button>

{{--                        @if(!request()->routeIs('profile.following'))--}}
                            <x-button type="secondary" href="#" wire:navigate>Suivis</x-button>
{{--                        @endif--}}

                        @if(auth()->user()->isPremium())
                            <x-button type="secondary" href="#" wire:navigate>Followers</x-button>
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

        <div class="mt-4">
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
</div>
