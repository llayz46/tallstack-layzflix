@props(['profile' => false, 'review'])

@if(!$profile)
    <div class="backdrop-blur-[3px] bg-background-accent-hover/25 isolate ring-1 ring-background-accent-hover flex p-4 gap-3 rounded-xl">
        <a href="{{ route('profile', $review['user']['slug']) }}" class="shrink-0">
            <img src="{{ $review['user']->getProfilePhoto() }}" class="rounded-full size-10 hover:scale-105 transition" alt="Photo de profil">
        </a>
        <div class="space-y-2 w-full">
            <h3 class="font-semibold text-gray-300">{{ $review['user']['username'] }}</h3>
            <p class="text-neutral-400 line-clamp-[8]">{{ $review['content'] }}</p>
        </div>
    </div>
@else
    <div {{ $attributes->merge(['class' => "flex max-sm:flex-col"]) }}>
        @if($review['media']['poster_path'])
            <a href="{{ route('show', ['id' => $review['media']['media_id'], 'type' => $review['media']['media_type'], 'slug' => Str::slug($review['media']['normalized_title'])]) }}" class="mb-4 flex-shrink-0 sm:mb-0 mr-4 hover:opacity-35 transition-opacity max-sm:mx-auto">
                <img class="shadow h-full border border-background-accent-hover bg-background-accent text-gray-300 sm:w-32 object-cover" src="https://image.tmdb.org/t/p/original{{ $review['media']['poster_path'] }}" alt="Affiche du film/série : {{ $review['media']['normalized_title'] }}">
            </a>
        @else
            <a href="{{ route('show', ['id' => $review['media']['media_id'], 'type' => $review['media']['media_type'], 'slug' => Str::slug($review['media']['normalized_title'])]) }}" class="mb-4 flex-shrink-0 sm:mb-0 sm:mr-4 hover:opacity-35 transition-opacity">
                <div role="status" class="mx-auto flex items-center justify-center h-full sm:w-32 max-sm:aspect-[2/3] bg-background-accent-hover">
                    <svg class="size-10 text-neutral-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"></path>
                        <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z"></path>
                    </svg>
                </div>
            </a>
        @endif
        <div class="max-sm:text-center">
            <h4 class="text-lg font-bold text-gray-300">{{ $review['media']['normalized_title'] }}</h4>
            <div class="flex max-sm:flex-col sm:gap-4 sm:items-center">
                <div class="my-2 flex items-center max-sm:mx-auto">
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
                <time class="text-neutral-400">{{ Illuminate\Support\Carbon::createFromDate($review['created_at'])->translatedFormat('j') }} {{ ucfirst(Illuminate\Support\Carbon::createFromDate($review['created_at'])->translatedFormat('F')) }} {{ Illuminate\Support\Carbon::createFromDate($review['created_at'])->translatedFormat('Y') }}</time>
            </div>
            <p class="mt-2 sm:mt-1 text-neutral-400">{{ $review['content'] }}</p>
        </div>
    </div>
@endif
