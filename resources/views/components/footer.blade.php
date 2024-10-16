<footer class="backdrop-blur-[2px] bg-background-accent-hover/25 isolate ring-1 ring-background-accent-hover" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8">
                <div class="flex gap-2">
                    <x-application-logo class="h-7 text-primary-700"/>
                    <h3 class="text-3xl bg-gradient-to-b from-primary-600 via-primary-600/90 to-primary-800/20 bg-clip-text text-center font-bold leading-none text-transparent">LayzFlix</h3>
                </div>
                <p class="text-sm leading-6 text-neutral-400">LayzFlix, votre appli cinéma incontournable ! Créez des playlists, suivez vos amis et partagez vos critiques. Rejoignez la communauté dès maintenant !</p>
                <div class="flex space-x-6">
                    <a href="https://github.com/llayz46" class="text-neutral-400 hover:text-gray-300">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://llayz.fr" class="text-neutral-400 hover:text-gray-300">
                        <span class="sr-only">My website</span>
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </a>
{{--                    TODO: mettreUnMailEnMailTo --}}
                    <a href="/mettreUnMailEnMailTo" class="text-neutral-400 hover:text-gray-300">
                        <span class="sr-only">Mail pro</span>
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold leading-6 text-gray-300">Légales</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="#" class="text-sm leading-6 text-neutral-400 hover:text-white">Conditions d'utilisation</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm leading-6 text-neutral-400 hover:text-white">Politique de confidentialité</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm leading-6 text-neutral-400 hover:text-white">Mentions légales</a>
                            </li>
                        </ul>
                    </div>
{{--                    <div class="mt-10 md:mt-0">--}}
{{--                        <h3 class="text-sm font-semibold leading-6 text-white">Support</h3>--}}
{{--                        <ul role="list" class="mt-6 space-y-4">--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Pricing</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Documentation</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Guides</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">API Status</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="md:grid md:grid-cols-2 md:gap-8">--}}
{{--                    <div>--}}
{{--                        <h3 class="text-sm font-semibold leading-6 text-white">Company</h3>--}}
{{--                        <ul role="list" class="mt-6 space-y-4">--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">About</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Blog</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Jobs</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Press</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Partners</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="mt-10 md:mt-0">--}}
{{--                        <h3 class="text-sm font-semibold leading-6 text-white">Legal</h3>--}}
{{--                        <ul role="list" class="mt-6 space-y-4">--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Claim</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Privacy</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Terms</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <div class="mt-16 border-t border-background-accent-hover pt-8 sm:mt-20 lg:mt-24">
            <p class="text-xs leading-5 text-neutral-400">&copy; 2024 Llayz. Tous droits réservés.</p>
        </div>
    </div>
</footer>
