@props(['media'])

<a href="{{ route('show', ['id' => Route::currentRouteName() === 'profile' ? $media['media_id'] : $media['id'], 'type' => $media['media_type'], 'slug' => Str::slug($media['normalized_title'])]) }}" wire:navigate
   {{ $attributes->class(['rounded-lg bg-background-normal group relative after:absolute after:size-full after:bg-red-500 after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:-z-[1] after:p-0.5 after:box-content after:opacity-0 after:transition-opacity after:duration-300 hover:after:opacity-100 after:transform after:inset-0 after:rounded-lg after:bg-conic-gradient after:animate-border-spin']) }}>
    <span class="sr-only">Link to {{ $media['normalized_title'] }}</span>
    @if($media['poster_path'])
        <img src="https://image.tmdb.org/t/p/w500{{ $media['poster_path'] }}" class="rounded-md size-full"
             alt="Poster of : {{ $media['normalized_title'] }}" sizes="(max-width: 1300px) 300px" loading="lazy">
    @else
        <div class="mb-4 flex-shrink-0 sm:mb-0 mr-4 size-full hover:opacity-35 transition-opacity">
            <div role="status" class="mx-auto flex items-center justify-center size-full bg-background-accent-hover rounded-md">
                <svg class="size-10 text-neutral-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"></path>
                    <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z"></path>
                </svg>
            </div>
        </div>
    @endif
    <span class="rounded-md absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 size-full bg-black/50 transition-opacity opacity-0 group-hover:opacity-100 z-10"></span>
    <div class="hidden group-hover:block absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
        <h3 class="text-lg font-semibold text-primary-600 text-center">{{ $media['normalized_title'] }}</h3>
        <p class="mt-1 text-sm text-neutral-300 text-center">{{ $media['release_date'] }}</p>
    </div>
</a>
