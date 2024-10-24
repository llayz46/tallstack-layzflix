@props(['media'])

<a href="{{ route('show', ['id' => $media['id'], 'type' => $media['media_type'], 'slug' => Str::slug($media['normalized_title'])]) }}" wire:navigate
   {{ $attributes->class(['rounded-lg bg-background-normal group relative after:absolute after:size-full after:bg-red-500 after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:-z-[1] after:p-0.5 after:box-content after:opacity-0 after:transition-opacity after:duration-300 hover:after:opacity-100 after:transform after:inset-0 after:rounded-lg after:bg-conic-gradient after:animate-border-spin']) }}>
    <span class="sr-only">Link to {{ $media['normalized_title'] }}</span>
    <img src="https://image.tmdb.org/t/p/w500{{ $media['poster_path'] }}" class="rounded-md w-full h-full"
         alt="Poster of : {{ $media['normalized_title'] }}" sizes="(max-width: 1300px) 300px" loading="lazy">
    <span class="rounded-md absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 size-full bg-black/50 transition-opacity opacity-0 group-hover:opacity-100 z-10"></span>
    <div class="hidden group-hover:block absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
        <h3 class="text-lg font-semibold text-primary-600 text-center">{{ $media['normalized_title'] }}</h3>
        <p class="mt-1 text-sm text-neutral-300 text-center">{{ $media['release_date'] }}</p>
    </div>
</a>
