<header class="lg:static lg:overflow-y-visible" :class="{ 'fixed inset-0 z-40 overflow-y-auto bg-background-normal': headerMobileMenu }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between">
            <div class="flex md:absolute md:inset-y-0 md:left-0 lg:static">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="h-8 w-auto text-primary-600" />
                    </a>
                </div>
            </div>
            <div class="min-w-0 flex-1 md:px-8 lg:px-0 mx-auto max-w-screen-sm">
                <div class="flex items-center px-6 py-4 md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                    <form class="w-full" action="{{ route('browse') }}" method="GET">
                        <label for="search" class="sr-only">Rechercher</label>
                        <div class="relative flex items-center"
                             x-data="{
                                 inputFocused: false,
                                 focusInput() {
                                     this.inputFocused = true;
                                     this.$nextTick(() => {
                                         this.$refs.input.focus();
                                     });
                                 },
                                 handleKeydown(event) {
                                     if (event.ctrlKey && event.key === 'k') {
                                         event.preventDefault(); // Évite le comportement par défaut
                                         this.focusInput();
                                     }
                                 }
                             }" @keydown.window="handleKeydown">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-neutral-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="search" x-ref="input" x-bind:focus="inputFocused" name="q" @keydown.window.prevent.ctrl.k="search = true" class="block w-full rounded-md border-0 bg-transparent py-1.5 pl-10 pr-3 text-neutral-300 ring-1 ring-inset ring-neutral-700 placeholder:text-neutral-500 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6" placeholder="Rechercher" type="text">
                            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5 cursor-default">
                                <kbd class="inline-flex items-center rounded border border-neutral-600 px-1 font-sans text-xs text-neutral-400">⌘K</kbd>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex items-center md:absolute md:inset-y-0 md:right-0 lg:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="headerMobileMenu = !headerMobileMenu" class="relative -mx-2 inline-flex items-center justify-center rounded-md p-2 text-neutral-400 hover:bg-background-accent-hover hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open menu</span>

                    <svg class="h-6 w-6" :class="{ 'hidden': headerMobileMenu, 'block': !headerMobileMenu }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg class="h-6 w-6" :class="{ 'block': headerMobileMenu, 'hidden': !headerMobileMenu }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:items-center lg:justify-end">
                <!-- Profile dropdown -->
                @auth
                    <div class="relative flex-shrink-0" x-data="{ profileDropdown: false }">
                        <div>
                            <button type="button" @click="profileDropdown = !profileDropdown" class="relative flex rounded-full focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:ring-offset-background-normal" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ auth()->user()->getProfilePhoto() }}" alt="Photo de profil de : {{ auth()->user()->username }}">
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-background-accent py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                             x-show="profileDropdown" @click.outside="profileDropdown = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="-transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="-transform opacity-0 scale-95" x-cloak>
                            <a href="{{ route('profile', auth()->user()->slug) }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-background-accent-hover" role="menuitem" wire:navigate>Profile</a>
                            <a href="{{ route('settings.show') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-background-accent-hover" role="menuitem" wire:navigate>Paramètres</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-300 hover:bg-background-accent-hover w-full text-left">Déconnexion</button>
                            </form>
                        </div>
                    </div>
                @else
                    <x-button type="link" href="{{ route('login') }}" wire:navigate>Connexion</x-button>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav class="lg:hidden" aria-label="Global" x-show="headerMobileMenu" @click.outside="headerMobileMenu = false"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="-translate-y-3 opacity-0"
         x-transition:enter-end="translate-y-0 opacity-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="translate-y-0 opacity-100"
         x-transition:leave-end="-translate-y-3 opacity-0" x-cloak>
        <div class="border-t border-background-accent-hover pb-3 pt-4">
            @auth
                <div class="mx-auto flex max-w-3xl items-center px-4 sm:px-6">
                    <div class="flex-shrink-0">
                        <img class="size-10 rounded-full" src="{{ auth()->user()->getProfilePhoto() }}" alt="Photo de profil de : {{ auth()->user()->username }}">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-300">{{ auth()->user()->username }}</div>
                        <div class="text-sm font-medium text-neutral-400">{{ auth()->user()->email }}</div>
                    </div>
                </div>
            @endauth
            <div class="mx-auto mt-3 max-w-3xl space-y-1 px-2 sm:px-4">
                @auth
                    <a href="{{ route('profile', auth()->user()->slug) }}" class="block rounded-md px-3 py-2 text-base font-medium text-neutral-400 hover:bg-background-accent-hover hover:text-gray-300" wire:navigate>Profile</a>
                    <a href="{{ route('settings.show') }}" class="block rounded-md px-3 py-2 text-base font-medium text-neutral-400 hover:bg-background-accent-hover hover:text-gray-300">Paramètres</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block rounded-md px-3 py-2 text-base font-medium text-neutral-400 hover:bg-background-accent-hover hover:text-gray-300">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-base font-medium text-neutral-400 hover:bg-background-accent-hover hover:text-gray-300">Connexion</a>
                    <a href="{{ route('register') }}" class="block rounded-md px-3 py-2 text-base font-medium text-neutral-400 hover:bg-background-accent-hover hover:text-gray-300">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>
</header>
