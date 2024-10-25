<div class="w-full max-w-2xl lg:col-span-4 lg:max-w-none mb-10">
    <div class="mx-auto mt-16 w-full max-w-2xl lg:col-span-4 lg:mt-0 lg:max-w-none">
        <div>
            <div class="border-b border-background-accent-hover mb-10">
                <p class="border-transparent text-gray-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium">Critiques</p>
            </div>

            <div class="-mb-10">
                <h3 class="sr-only">Reviews</h3>
                @if($reviews)
                    @foreach($reviews as $review)
                        <div @class(['flex space-x-4 text-sm text-neutral-400 w-full mb-10', 'border-b border-background-accent-hover' => !$loop->last]) wire:key="{{ $review->id }}">
                            <div class="block w-fit min-w-10">
                                <img src="{{ $review['user']->getProfilePhoto() }}" alt="Avatar de : {{ $review['user']['username'] }}" class="inline-block size-10 rounded-full">
                            </div>
                            <div class="block pb-10">
                                <h3 class="font-medium text-gray-300">{{ $review['user']['username'] }}</h3>
                                <p><time datetime="{{ $review['created_at'] }}">{{ Illuminate\Support\Carbon::createFromDate($review['created_at'])->translatedFormat('j') }} {{ ucfirst(Illuminate\Support\Carbon::createFromDate($review['created_at'])->translatedFormat('F')) }} {{ Illuminate\Support\Carbon::createFromDate($review['created_at'])->translatedFormat('Y') }}</time></p>

                                <div class="mt-2 flex items-center">
                                    @for($i = 0; $i < $review['rating']; $i++)
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>
                                    @endfor
                                    @for($i = $review['rating']; $i < 5; $i++)
                                        <svg class="text-neutral-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>
                                    @endfor
                                </div>

                                <div class="prose prose-sm mt-2 max-w-none text-neutral-400">
                                    <p>{{ Str::ucfirst($review['content']) }}</p>
                                </div>

                                @auth
                                    @if($review->user_id === auth()->user()->id)
                                        <form wire:submit="delete({{ $review }})" class="mt-2">
                                            <x-button>Supprimer</x-button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

{{--            @if($reviews->hasPages())--}}
{{--                <div class="border-t border-gray-200 dark:border-white/10 py-5 mt-10">--}}
{{--                    {{ $reviews->links() }}--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
    </div>

    <div class="mx-auto mt-16 w-full max-w-2xl lg:col-span-4 lg:pt-8 lg:mt-0 lg:max-w-none">
        @auth
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <img src="{{ auth()->user()->getProfilePhoto() }}" alt="Avatar de : {{ auth()->user()->username }}" class="inline-block size-10 rounded-full">
                </div>
                <div class="min-w-0 flex-1">
                    <form wire:submit.prevent="submit">
                        <div class="relative">
                            <div class="overflow-hidden rounded-lg shadow-sm ring-1 ring-inset ring-background-accent-hover backdrop-blur-[2px] bg-background-accent-hover/25 focus-within:ring-2 focus-within:ring-primary-600">
                                <label for="comment" class="sr-only">Add your comment</label>
                                <textarea rows="4" wire:model="content" name="comment" id="comment"
                                          class="block w-full resize-none border-0 bg-transparent py-1.5 text-gray-300 placeholder:text-neutral-400 focus:ring-0 sm:text-sm sm:leading-6"
                                          placeholder="Partagez votre avis..."></textarea>
                            </div>

                            <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 px-2">
                                <div x-data="{
                                        disabled: false,
                                        max_stars: 5,
                                        stars: @entangle('rating'),
                                        value: @entangle('rating'),
                                        rate(star){
                                            if (this.disabled) {
                                                return;
                                            }

                                            this.stars = star;
                                            this.value = star;
                                        }
                                    }" x-init="this.stars = this.value" class="mt-auto">
                                    <ul class="flex space-x-1">
                                        <template x-for="star in max_stars">
                                            <li @click="rate(star)" class="cursor-pointer" :class="{ 'text-gray-400 cursor-not-allowed': disabled}">
                                                <svg x-show="star > stars" class="size-5 text-neutral-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z"/></svg>
                                                <svg x-show="star <= stars" class="size-5 text-yellow-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z"/></svg>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                                <div class="flex-shrink-0">
                                    <x-button type="button">@if($content) Modifier @else Poster @endif</x-button>
                                </div>
                            </div>
                        </div>

                        <x-input-error for="content" class="mt-1 pl-2"/>
                        <x-input-error for="rating" class="mt-1 pl-2"/>
                    </form>
                </div>
            </div>
        @endauth
{{--        @guest--}}
{{--            <div class="flex justify-center mt-16 lg:mt-0">--}}
{{--                <div class="w-fit relative rounded-full px-3 py-1 text-sm leading-6 text-body ring-1 ring-gray-200 dark:ring-white/10 group">--}}
{{--                    You must be logged in to add a comment. <a href="{{ route('login') }}" class="font-semibold text-primary-500 group-hover:text-primary-400"><span class="absolute inset-0" aria-hidden="true"></span>Please sign in <span aria-hidden="true">&rarr;</span></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endguest--}}
    </div>
{{--    @if(session('reviewSuccess') || session('reviewError'))--}}
{{--        <x-notification status="{{ session('reviewSuccess') ? 'reviewSuccess' : 'reviewError' }}" title="{{ session('reviewSuccess') ? 'success' : 'error' }}"/>--}}
{{--    @endif--}}
</div>
