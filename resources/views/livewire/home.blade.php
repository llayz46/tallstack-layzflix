<div class="relative isolate">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80 pointer-events-none" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-primary-600/75 to-primary-800/50 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74% 44%, 100% 61.6%, 97.4% 26.8%, 85.4% 0%, 80.6% 2%, 72.4% 32.4%, 60.2% 62.4%, 52.4% 68%, 47.4% 58.2%, 45.2% 34.4%, 30.8% 50%, 27.4% 76.6%, 15.8% 66.6%, 0% 64.8%, 8.2% 82.8%, 17.8% 100%, 24.8% 84%, 27.6% 76.8%, 34.8% 85%, 59.2% 88%, 76% 97.6%, 74% 44%)"></div>
    </div>
    <section class="mx-auto max-w-2xl py-32 sm:pt-48">
        <div class="text-center max-sm:px-6">
            <h1 class="text-4xl font-bold tracking-tight text-neutral-100 sm:text-6xl">Partage et échange avec <br> <span class="bg-gradient-to-b from-primary-600 via-primary-600/90 to-primary-800/20 bg-clip-text text-center font-bold leading-none text-transparent">la communauté !</span></h1>
            <p class="mt-6 text-lg leading-8 text-neutral-400">Partage tes critiques et découvre celles des autres cinéphiles. Rejoins la discussion sur les films récents ou les classiques qui t'ont marqué !</p>
            <div class="mt-10 gap-x-6">
                <x-button-primary-border href="{{ route('register') }}">Rejoins nous !</x-button-primary-border>
            </div>
        </div>
    </section>
    <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl md:top-[calc(20%-28rem)] sm:top-[calc(20%-45rem)] top-[calc(20%-33rem)] pointer-events-none" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-primary-700/70 to-primary-800/10 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path:polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>

    <section class="relative mx-auto max-w-7xl px-4 pb-16 sm:px-6 sm:py-16 lg:px-8 lg:pb-32">
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
    </section>

    <x-homepage.section-wrapper>
        <x-homepage.section-block-title>
            <x-slot:preTitle>Films et séries</x-slot:preTitle>
            <x-slot:title>Les plus populaires</x-slot:title>
            <x-slot:description>Découvrez les coups de cœur de nos utilisateurs ! Plongez dans une
                sélection qui met en lumière les films et séries les plus appréciés par notre communauté !</x-slot:description>
        </x-homepage.section-block-title>

        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 xl:gap-x-8 mt-6 lg:mt-8">
            @foreach($popularMedias as $media)
                <x-card.media :$media>
                    <x-slot:rank>
                        <svg class="-mt-[3px] absolute left-1/2 -translate-x-1/2 text-primary-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" stroke="currentColor" fill="none">
                            @switch($media['rank'])
                                @case(1)
                                    <circle cx="12" cy="15.5" r="6.5" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M9 9.5L5.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15 9.5L18.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15 2L14 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5 9L9.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11 18H12M12 18H13M12 18V13L11 13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    @break
                                @case(2)
                                    <path d="M10.5 14L11.0305 13.4285C11.653 12.799 12.6825 12.873 13.2107 13.5852C13.6233 14.1417 13.5915 14.915 13.1346 15.4349L10.5 18H13.4315" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="12" cy="15.5" r="6.5" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M9 9.5L5.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15 9.5L18.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15 2L14 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5 9L9.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    @break
                                @case(3)
                                    <path d="M10.5 14C10.8265 13.347 11.2786 13 12 13C12.7296 13 13.5 13.4558 13.5 14.25C13.5 14.9404 12.9404 15.5 12.25 15.5C12.9404 15.5 13.5 16.0596 13.5 16.75C13.5 17.5442 12.7296 18 12 18C11.2786 18 10.8265 17.653 10.5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="12" cy="15.5" r="6.5" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M9 9.5L5.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15 9.5L18.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15 2L14 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5 9L9.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    @break
                            @endswitch
                        </svg>
                    </x-slot:rank>
                </x-card.media>
            @endforeach
        </div>
    </x-homepage.section-wrapper>

    <x-homepage.section-wrapper class="relative">
        <div class="absolute inset-x-0 overflow-hidden rotate-[190deg] top-40 -z-10 transform-gpu md:px-36 blur-3xl" aria-hidden="true">
            <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-primary-600/50 to-primary-800/50 opacity-30" style="clip-path:polygon(79.8% 60%, 86.6% 66.2%, 95.2% 75.6%, 100% 61%, 97.4% 28.2%, 85.4% -0.6%, 80.6% 1.4%, 75.6% 9.4%, 78.8% 22.2%, 71.4% 31.8%, 58.8% 39.6%, 60.2% 61.8%, 52.4% 67.4%, 47.4% 57.6%, 45.2% 33.8%, 32.2% 49.2%, 25.6% 68.2%, 0% 64.2%, 17.8% 99.4%, 29.4% 82.8%, 45% 87.2%, 59.2% 84.2%, 76% 97%, 74.8% 66.2%);">
            </div>
        </div>
        <x-homepage.section-block-title>
            <x-slot:preTitle>Nouveautés</x-slot:preTitle>
            <x-slot:title>Derniers avis des utilisateurs</x-slot:title>
            <x-slot:description>Lisez les dernières critiques postées par notre communauté. Découvrez les opinions fraîches sur les films et séries du moment !</x-slot:description>
        </x-homepage.section-block-title>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-6 lg:mt-8">
            @foreach($reviews as $review)
                <x-card.review :$review/>
            @endforeach
        </div>
    </x-homepage.section-wrapper>

    <x-homepage.section-wrapper class="relative">
        <div class="absolute inset-x-0 overflow-hidden top-80 -z-10 transform-gpu md:px-36 blur-3xl" aria-hidden="true">
            <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-primary-600/50 to-primary-800/50 opacity-30" style="clip-path:polygon(79.8% 60%, 86.6% 66.2%, 95.2% 75.6%, 94.4% 49.6%, 80.4% 58.8%, 73% 44%, 66% 47.2%, 59.4% 57.6%, 49% 58%, 35.4% 56.6%, 31.2% 44.6%, 29.6% 33.4%, 26.8% 25.6%, 20% 28.4%, 21.2% 38.2%, 22.8% 46.4%, 14.8% 49.8%, 9.4% 52.8%, 17.2% 55.6%, 12.2% 62.6%, 26.6% 59%, 29.4% 67.8%, 21.6% 79.2%, 20.8% 91.2%, 35.4% 79.2%, 44.6% 90.6%, 59.2% 90.2%, 46.8% 81.4%, 45% 70%, 56% 66.4%, 67.2% 64.2%);">
            </div>
        </div>
        <x-homepage.section-block-title>
            <x-slot:preTitle>Engagement des utilisateurs</x-slot:preTitle>
            <x-slot:title>Nos membres les plus actifs</x-slot:title>
            <x-slot:description>Découvrez les utilisateurs les plus engagés. Ces membres se démarquent par leurs critiques et
                interactions régulières. Rejoignez-les et partagez votre passion !</x-slot:description>
        </x-homepage.section-block-title>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 md:gap-4 mt-6 lg:mt-8">
{{--            TODO: a voir le responsive --}}
            <x-card.user-active/>
            <x-card.user-active/>
            <x-card.user-active/>
        </div>
    </x-homepage.section-wrapper>

    <x-homepage.section-wrapper>
        <x-homepage.section-block-title>
            <x-slot:preTitle>Devenez Premium</x-slot:preTitle>
            <x-slot:title>Accédez à des avantages exclusifs</x-slot:title>
            <x-slot:description>Profitez d'une expérience enrichie avec des fonctionnalités supplémentaires, un badge personnalisé et autres.</x-slot:description>
        </x-homepage.section-block-title>

        <div class="mt-16 sm:mt-20 md:mt-24 mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base leading-7 text-gray-300 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">
            <x-premium-feature-block>
                <x-slot:svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                    </svg>
                </x-slot:svg>
                <x-slot:title>Badge Premium</x-slot:title>
                <x-slot:description>Démarquez-vous dans la communauté avec un badge exclusif, symbole de votre statut
                    privilégié et de vos avantages.</x-slot:description>
            </x-premium-feature-block>
            <x-premium-feature-block>
                <x-slot:svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </x-slot:svg>
                <x-slot:title>Suivi des Abonnés</x-slot:title>
                <x-slot:description>Consultez facilement la liste de vos abonnés pour voir qui vous suit et interagissez avec eux directement depuis votre profil.</x-slot:description>
            </x-premium-feature-block>
            <x-premium-feature-block>
                <x-slot:svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M48,64a8,8,0,0,1,8-8H72V40a8,8,0,0,1,16,0V56h16a8,8,0,0,1,0,16H88V88a8,8,0,0,1-16,0V72H56A8,8,0,0,1,48,64ZM184,192h-8v-8a8,8,0,0,0-16,0v8h-8a8,8,0,0,0,0,16h8v8a8,8,0,0,0,16,0v-8h8a8,8,0,0,0,0-16Zm56-48H224V128a8,8,0,0,0-16,0v16H192a8,8,0,0,0,0,16h16v16a8,8,0,0,0,16,0V160h16a8,8,0,0,0,0-16ZM219.31,80,80,219.31a16,16,0,0,1-22.62,0L36.68,198.63a16,16,0,0,1,0-22.63L176,36.69a16,16,0,0,1,22.63,0l20.68,20.68A16,16,0,0,1,219.31,80Zm-54.63,32L144,91.31l-96,96L68.68,208ZM208,68.69,187.31,48l-32,32L176,100.69Z"></path>
                    </svg>
                </x-slot:svg>
                <x-slot:title>Playlists Illimitées</x-slot:title>
                <x-slot:description>Un nombre de playlists illimité pour regrouper vos films et séries préférés.
                    Organisez vos playlists comme vous le voulez, sans aucune limite !</x-slot:description>
            </x-premium-feature-block>
        </div>

        <div class="sm:my-16 my-24 mx-auto max-w-4xl backdrop-blur-[2px] bg-background-accent-hover/25 isolate ring-1 ring-background-accent-hover flex flex-col items-center p-4 rounded-xl">
            <div class="space-y-1 text-center mb-6">
                <h3 class="text-xl font-bold tracking-tight text-white sm:text-2xl">Passez au Premium</h3>
                <p class="text-lg leading-8 text-gray-300">Accédez à toutes les fonctionnalités Premium dès aujourd'hui pour profiter pleinement de LayzFlix.</p>
                <h3 class="text-gray-300 text-lg">Pour seulement <span class="text-xl text-white font-bold">2,99€</span> par mois.</h3>
            </div>
            <x-button-primary-border href="#">S'abonner</x-button-primary-border>
        </div>
    </x-homepage.section-wrapper>

{{--        <div class="mx-auto max-w-2xl sm:text-center">--}}
{{--            <h2 class="text-base font-semibold leading-7 text-primary-600">Engagement des utilisateurs</h2>--}}
{{--            <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Nos membres les plus actifs</p>--}}
{{--            <p class="mt-6 text-lg leading-8 text-gray-300">Découvrez les coups de cœur de nos utilisateurs ! Plongez dans une sélection qui met en lumière les films et séries les plus appréciés par notre communauté !</p>--}}
{{--        </div>--}}

{{--        <div class="mx-auto mt-16 max-w-7xl px-6 sm:mt-20 md:mt-24 lg:px-8">--}}
{{--            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base leading-7 text-gray-300 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">--}}
{{--                <div class="relative pl-6 border-l" style="border-image:linear-gradient(#d5294d, #07070e) 1 100% / 1 / 0 stretch;">--}}
{{--                    <div class="font-semibold text-white">--}}
{{--                        Payments--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        All payments are handled by--}}
{{--                        <a class="underline" href="https://stripe.com" target="_blank">Stripe</a>--}}
{{--                        . Subscription, one-time payments, and more are ready to use.--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.0.6/tsparticles.bundle.min.js"></script>
    @vite('resources/js/tsparticles.js')
</div>
