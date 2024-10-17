<div class="mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 mt-8 sm:mt-6">
    @php $user = auth()->user() @endphp
    <div class="flex justify-center min-[420px]:justify-between">
        <div>
            <div class="flex items-start space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16 rounded-full object-cover shadow-inner" src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : 'https://ui-avatars.com/api/?background=ebf4ff&name='. auth()->user()->username .'&color=d5294d&font-size=0.5&semibold=true&format=svg' }}" alt="">
                        <span class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="pt-1.5">
                    <h1 class="text-2xl font-bold text-white">{{ $user->username }}</h1>
                    <p class="text-sm font-medium text-gray-300">{{ Str::ucfirst($user->biography) }}</p>
                </div>
            </div>
            <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-3 sm:space-y-0 sm:space-x-reverse">
                @auth
                    @if($user->id !== auth()->user()->id)
                        <x-button class="cursor-not-allowed" type="secondary">Message</x-button>
                    @endif

                    @if($user->id === auth()->user()->id)
                        <x-button type="link" href="#">Edit profile</x-button>

{{--                        @if(!request()->routeIs('profile.following'))--}}
                            <x-button type="secondary" href="#">Suivis</x-button>
{{--                        @endif--}}

                        @if(auth()->user()->isPremium())
                            <x-button type="secondary" href="#">Followers</x-button>
                        @endif
                    @else
{{--                        @if(!auth()->user()->isFollowing($user))--}}
{{--                            <form action="{{ route('follow.add', $user) }}" method="post">--}}
{{--                                @csrf--}}
{{--                                <x-button type="submit">Follow</x-button>--}}
{{--                            </form>--}}
{{--                        @else--}}
{{--                            <form action="{{ route('follow.delete', $user) }}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <x-button type="submit">Unfollow</x-button>--}}
{{--                            </form>--}}
{{--                        @endif--}}
                    @endif
                @endauth

                @guest
{{--                    <x-button href="{{ route('auth.login') }}" type="secondary">Message</x-button>--}}
{{--                    <x-button href="{{ route('auth.login') }}">Add friend</x-button>--}}
                @endguest
            </div>
        </div>

{{--        <div class="sm:mt-4 flex flex-col max-[420px]:hidden space-y-1.5 md:block @if(!$numberOfReviews && !$numberOfMovies) sm:hidden @endif">--}}
{{--            @if($user->isPremium())--}}
{{--                <x-profile-premium-badge/>--}}
{{--            @endif--}}

            <x-profile-level-badge :level="$user->level"/>

{{--            @if($numberOfMovies)--}}
{{--                <x-badge tag="span">{{ $numberOfMovies }} Favorite movie/serie(s)</x-badge>--}}
{{--            @endif--}}

{{--            @if($numberOfReviews)--}}
{{--                <x-badge tag="span">{{ $numberOfReviews }} Review(s)</x-badge>--}}
{{--            @endif--}}

{{--            @if($followers)--}}
{{--                <x-badge tag="span">{{ $followers }} Follower(s)</x-badge>--}}
{{--            @endif--}}
{{--        </div>--}}
    </div>
</div>
