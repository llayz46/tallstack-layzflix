<x-app-layout title="Résultats : {{ Str::title($query) }} - LayzFlix">
    <div class="relative isolate">
        <div class="mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 mt-8 sm:mt-6">
            <div class="mt-4">
                <p class="text-gray-300 text-sm font-medium">{{ $results ? 'Nous avons trouvé '. $totalResults .' résultats pour' : 'Nous n\'avons trouvé aucun résultat pour' }} "{{ Str::title($query) }}".</p>

                <div class="mt-2 border-t border-background-accent-hover pt-5">
                    @if($results->items())
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6 lg:grid-cols-5 max-md:gap-y-8">
                            @foreach($results as $result)
                                <x-card.media :media="$result"/>
                            @endforeach
                        </div>

                        {{ $results->links() }}
                    @else
                        <h2 class="text-2xl font-bold tracking-tight text-gray-300 text-center">Aucun résultat trouvé pour {{ Str::title($query) }}.</h2>
                    @endif
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.0.6/tsparticles.bundle.min.js"></script>
        @vite('resources/js/tsparticles.js')
    </div>
</x-app-layout>
