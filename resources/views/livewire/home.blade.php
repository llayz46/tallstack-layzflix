<div class="relative isolate">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80 pointer-events-none" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-primary-600/75 to-primary-800/50 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-2xl py-32 sm:pt-48">
        <div class="text-center">
            <h1 class="text-4xl font-bold tracking-tight text-neutral-100 sm:text-6xl">Partage et échange avec <br> <span class="bg-gradient-to-b from-primary-600 via-primary-600/90 to-primary-800/20 bg-clip-text text-center font-bold leading-none text-transparent">la communauté !</span></h1>
            <p class="mt-6 text-lg leading-8 text-neutral-400">Partage tes critiques et découvre celles des autres cinéphiles. Rejoins la discussion sur les films récents ou les classiques qui t'ont marqué !</p>
            <div class="mt-10 gap-x-6">
                <a href="{{ route('register') }}" class="rounded-md border-t-2 border-primary-600/30 bg-primary-600/20 px-6 py-2.5 font-semibold text-primary-600 shadow-sm hover:bg-primary-600/15 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Rejoins nous !</a>
            </div>
        </div>
    </div>
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-32rem)] pointer-events-none" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-primary-700/70 to-primary-800/10 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path:polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 pb-16 sm:px-6 sm:py-16 lg:px-8 lg:pb-32">
        <div class="grid gap-y-8 sm:grid-cols-4">
            <x-feature-block>
                <x-slot:number>1</x-slot:number>
                <strong class="text-primary-600">Échange</strong> avec des cinéphiles et <strong class="text-primary-600">partage</strong> ton avis !
            </x-feature-block>
            <x-feature-block>
                <x-slot:number>2</x-slot:number>
                Créer des <strong class="text-primary-600">playlist</strong> avec tes films et séries préférés !
            </x-feature-block>
            <x-feature-block>
                <x-slot:number>3</x-slot:number>
                <strong class="text-primary-600">Badges</strong> en récompense pour tes <strong class="text-primary-600">contributions</strong> !
            </x-feature-block>
            <x-feature-block>
                <x-slot:number>4</x-slot:number>
                Crée ton <strong class="text-primary-600">profile</strong> et partage-le avec la communauté !
            </x-feature-block>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.0.6/tsparticles.bundle.min.js"></script>
    @vite('resources/js/tsparticles.js')
</div>
