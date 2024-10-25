<div>
    <div class="absolute inset-x-0 overflow-hidden top-0 left-0 -z-10 transform-gpu blur-3xl" aria-hidden="true">
        <div class="aspect-[500/400] w-[50rem] mr-auto bg-gradient-to-tr from-primary-600/50 to-primary-800/50 opacity-30" style="clip-path:polygon(79.8% 60%, 86.6% 66.2%, 95.2% 75.6%, 100% 61%, 97.4% 28.2%, 85.4% -0.6%, 80.6% 1.4%, 75.6% 9.4%, 78.8% 22.2%, 71.4% 31.8%, 58.8% 39.6%, 60.2% 61.8%, 52.4% 67.4%, 47.4% 57.6%, 45.2% 33.8%, 32.2% 49.2%, 25.6% 68.2%, 0% 64.2%, 17.8% 99.4%, 29.4% 82.8%, 45% 87.2%, 59.2% 84.2%, 76% 97%, 74.8% 66.2%);"></div>
    </div>
    <div class="absolute inset-x-0 overflow-hidden top-[90rem] lg:block hidden lg:top-80 -z-10 transform-gpu md:px-36 blur-3xl" aria-hidden="true">
        <div class="ml-auto aspect-[1155/750] w-[72.1875rem] bg-gradient-to-tr from-primary-600/50 to-primary-800/50 opacity-30" style="clip-path:polygon(79.8% 60%, 86.6% 66.2%, 95.2% 75.6%, 94.4% 49.6%, 80.4% 58.8%, 73% 44%, 66% 47.2%, 59.4% 57.6%, 49% 58%, 35.4% 56.6%, 31.2% 44.6%, 29.6% 33.4%, 26.8% 25.6%, 20% 28.4%, 21.2% 38.2%, 22.8% 46.4%, 14.8% 49.8%, 9.4% 52.8%, 17.2% 55.6%, 12.2% 62.6%, 26.6% 59%, 29.4% 67.8%, 21.6% 79.2%, 20.8% 91.2%, 35.4% 79.2%, 44.6% 90.6%, 59.2% 90.2%, 46.8% 81.4%, 45% 70%, 56% 66.4%, 67.2% 64.2%);"></div>
    </div>
    <div class="my-8 sm:my-12 mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <x-breadcrumb :$media :director="$media['directors']" />
    </div>

    <div>
        <div class="mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-7 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16 relative">
                <div class="lg:col-span-4 lg:row-end-1">
                    @if($media['poster_path'])
                        <div class="overflow-hidden rounded-lg bg-gray-100">
                            <img src="https://image.tmdb.org/t/p/original{{ $media['poster_path'] }}" sizes="(max-width: 1300px) 670px" class="relative z-50 object-cover size-full rounded-lg border border-background-accent-hover shadow" loading="lazy" alt="Movie image of : {{ $media['normalized_title'] }}">
                        </div>
                    @else
                        <div role="status" class="flex items-center justify-center aspect-video h-full w-full bg-background-accent-hover rounded-lg animate-pulse">
                            <svg class="w-10 h-10 text-neutral-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                                <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    @endif
                </div>

                <div class="mx-auto mt-14 max-w-2xl sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:ml-0 lg:max-w-none relative">
                    <div class="absolute inset-x-0 overflow-hidden bottom-2 lg:hidden -z-10 transform-gpu blur-3xl" aria-hidden="true">
                        <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-primary-600/50 to-primary-800/50 opacity-30" style="clip-path:polygon(79.8% 60%, 86.6% 66.2%, 95.2% 75.6%, 94.4% 49.6%, 80.4% 58.8%, 73% 44%, 66% 47.2%, 59.4% 57.6%, 49% 58%, 35.4% 56.6%, 31.2% 44.6%, 29.6% 33.4%, 26.8% 25.6%, 20% 28.4%, 21.2% 38.2%, 22.8% 46.4%, 14.8% 49.8%, 9.4% 52.8%, 17.2% 55.6%, 12.2% 62.6%, 26.6% 59%, 29.4% 67.8%, 21.6% 79.2%, 20.8% 91.2%, 35.4% 79.2%, 44.6% 90.6%, 59.2% 90.2%, 46.8% 81.4%, 45% 70%, 56% 66.4%, 67.2% 64.2%);"></div>
                    </div>
                    <div class="flex flex-col-reverse">
                        <h1 class="mt-4 text-2xl font-bold tracking-tight text-white sm:text-3xl">{{ $media['normalized_title'] }}</h1>

                        <div>
                            <h3 class="sr-only">Rating</h3>
                            <div class="flex items-center">
                                @for($i = 0; $i < round(4); $i++)
                                    <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                    </svg>
                                @endfor
                                @if(round(4) !== 5) {{-- $note --}}
                                    @for($i = round(4); $i < 5; $i++)
                                        <svg class="text-gray-300 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>
                                    @endfor
                                @endif
                            </div>
                        </div>
                    </div>

                    <p class="mt-6 text-neutral-400">{{ $media['overview'] }}</p>

                    <div class="mt-4 space-y-2">
                        <p class="text-sm text-neutral-400"><strong class="text-gray-300">Date de sortie :</strong> @if($media['release_date']) <time datetime="{{ $media['release_date'] }}">{{ Illuminate\Support\Carbon::createFromDate($media['release_date'])->translatedFormat('j') }} {{ ucfirst(Illuminate\Support\Carbon::createFromDate($media['release_date'])->translatedFormat('F')) }} {{ Illuminate\Support\Carbon::createFromDate($media['release_date'])->translatedFormat('Y') }}</time> @else Pas d'information... @endif</p>
                        <p class="text-sm text-neutral-400"><strong class="text-gray-300">Producteur/Réalisateur</strong> : @if($media['directors']) @foreach($media['directors'] as $dir) {{ $dir['name'] }}@if(!$loop->last),@endif @if($loop->index === 5) @break @endif @endforeach @else Pas d'information... @endif</p>
                    </div>

                    @guest
                        <span class="isolate inline-flex rounded-md shadow-sm mt-6">
                            <a href="{{ route('login') }}" wire:navigate class="relative inline-flex items-center gap-x-1.5 rounded-l-md bg-background-accent/25 px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-background-accent-hover hover:bg-background-accent/50 focus:z-10">
                                <svg class="-ml-0.5 h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 2c-1.716 0-3.408.106-5.07.31C3.806 2.45 3 3.414 3 4.517V17.25a.75.75 0 001.075.676L10 15.082l5.925 2.844A.75.75 0 0017 17.25V4.517c0-1.103-.806-2.068-1.93-2.207A41.403 41.403 0 0010 2z" clip-rule="evenodd" />
                                </svg>
                                Favoris
                            </a>
                            <p class="relative -ml-px inline-flex items-center rounded-r-md bg-background-accent/25 px-3 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-background-accent-hover focus:z-10 cursor-default">{{ $favoriteCount }}</p>
                        </span>
                    @endguest

                    @auth
                        <div class="isolate inline-flex rounded-md shadow-sm mt-6">
                            <button wire:click="favorite({{ $media['id'] }}, '{{ $media['media_type'] }}', '{{ $media['normalized_title'] }}', '{{ addslashes($media['overview']) }}', '{{ $media['poster_path'] }}', '{{ $media['release_date'] }}')" class="relative inline-flex items-center gap-x-1.5 rounded-l-md bg-background-accent/25 px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-background-accent-hover hover:bg-background-accent/50 focus:z-10">
                                <svg @class(['-ml-0.5 h-5 w-5', 'text-gray-300' => !$isFavorite, 'text-yellow-400' => $isFavorite]) viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 2c-1.716 0-3.408.106-5.07.31C3.806 2.45 3 3.414 3 4.517V17.25a.75.75 0 001.075.676L10 15.082l5.925 2.844A.75.75 0 0017 17.25V4.517c0-1.103-.806-2.068-1.93-2.207A41.403 41.403 0 0010 2z" clip-rule="evenodd" />
                                </svg>
                                {{ $isFavorite ? 'Supprimer des favoris' : 'Ajouter aux favoris' }}
                            </button>
                            <p class="relative -ml-px inline-flex items-center rounded-r-md bg-background-accent/25 px-3 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-background-accent-hover focus:z-10 cursor-default">{{ $favoriteCount }}</p>
                        </div>

                        <button type="button" class="rounded-full bg-primary-600 p-1.5 ml-2 text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                        </button>

{{--                        <x-drawer :media="$movie"/>--}}
                    @endauth

                    @if ($media['credits']['cast'])
                        <div class="mt-10 border-t border-background-accent-hover pt-10">
                            <h3 class="text-sm font-medium text-gray-300">Casting</h3>
                            <div class="prose prose-sm mt-4 text-neutral-400">
                                <ul role="list">
                                    @foreach($media['credits']['cast'] as $cast)
                                        <li>
                                            {{ $cast['name'] }}
                                            @if(!empty($cast['character']))
                                                joue <strong class="text-gray-300">{{ $cast['character'] }}</strong>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if ($media['genres'])
                        <div class="mt-10 border-t border-background-accent-hover pt-10">
                            <h3 class="text-sm font-medium text-gray-300">Genres</h3>
                            <ul class="mt-4">
                                @foreach($media['genres'] as $genre)
                                    <x-badge tag="li">{{ $genre['name'] }}</x-badge>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="absolute inset-x-0 overflow-hidden max-md:-bottom-48 md:bottom-0 -z-10 transform-gpu blur-3xl testGROS" aria-hidden="true">
                    <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-primary-600/50 to-primary-800/50 opacity-20" style="clip-path:polygon(58.2% 28.2%, 65.6% 17.4%, 79% 10%, 95.4% 24.4%, 98% 35%, 97.4% 47.2%, 90.4% 55.8%, 92.8% 66.8%, 99.4% 78%, 83.2% 77.8%, 77.2% 74%, 74.6% 66.4%, 79.8% 61.2%, 77.4% 55%, 86.4% 46.6%, 72.8% 42%, 58.4% 28.6%, 39.8% 35.8%, 32.4% 42.8%, 47.2% 54.4%, 39.6% 60.2%, 34.2% 68%, 31.8% 81.2%, 26.4% 94.2%, 12% 90%, 4% 79.8%, 4.4% 63.6%, 20% 57.4%, 23.8% 48.6%, 20% 36.2%, 12.8% 25.8%, 18.6% 15.2%, 30.4% 17.6%, 36.8% 27.4%);"></div>
                </div>

                <livewire:review :$media/>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.0.6/tsparticles.bundle.min.js"></script>
    @vite('resources/js/tsparticles.js')
</div>
