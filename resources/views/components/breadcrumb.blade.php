@props(['media', 'director'])

<nav class="flex" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-4">
        <li>
            <a href="{{ route('home') }}" class="text-neutral-300 hover:text-primary-400 transition-colors">
                <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Home</span>
            </a>
        </li>
        @if($director)
            @foreach($director as $dir)
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-neutral-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <a class="ml-4 text-sm font-medium text-neutral-300 hover:text-primary-400 transition-colors" href="{{ route('directors', [$dir['id'], Str::slug($dir['name'])]) }}">{{ $dir['name'] }}</a>
                    </div>
                </li>
            @endforeach
        @endif
        <li>
            <div class="flex items-center">
                <svg class="h-5 w-5 flex-shrink-0 text-neutral-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <form method="GET" action="{{ route('browse') }}">
                    <input type="hidden" name="q" value="{{ $media['normalized_title'] }}">
                    <button class="ml-4 text-sm font-medium text-neutral-300 hover:text-primary-400 transition-colors">{{ $media['normalized_title'] }}</button>
                </form>
            </div>
        </li>
    </ol>
</nav>
