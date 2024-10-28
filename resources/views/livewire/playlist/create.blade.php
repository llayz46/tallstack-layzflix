<form class="flex h-full flex-col divide-y divide-background-accent-hover bg-background-accent shadow-xl" method="POST" x-show="activeTab === 'CreatePlaylist'" wire:submit.prevent="save">
    <div class="h-0 flex-1 overflow-y-auto">
        <x-playlist-header-drawer/>
        <div class="flex pt-1 gap-2 text-base font-medium leading-6 text-center">
            <button type="button" @click="activeTab = 'AddPlaylist'" class="w-1/2 pb-1 border-b-2" :class="activeTab === 'AddPlaylist' ? 'border-primary-600 text-white' : 'border-transparent text-neutral-400 hover:text-gray-300'">Ajouter à une playlist</button>
            <button type="button" @click="activeTab = 'CreatePlaylist'" class="w-1/2 pb-1 border-b-2" :class="activeTab === 'CreatePlaylist' ? 'border-primary-600 text-white' : 'border-transparent text-neutral-400 hover:text-gray-300'">Créer une playlist</button>
        </div>
        <div class="flex flex-1 flex-col justify-between">
            <div class="divide-y divide-background-accent-hover px-4 sm:px-6">
                <div class="space-y-6 pb-5 pt-6">
                    <div>
                        <x-label for="playlist-name">Nom de votre playlist</x-label>
                        <x-input id="playlist-name" class="mt-2" type="text" wire:model="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="playlist-description">Description de votre playlist</x-label>
                        <textarea x-data="{
                            resize () {
                                $el.style.height = '0px';
                                $el.style.height = $el.scrollHeight + 'px'
                            }
                        }" x-init="resize()" @input="resize()" type="text"
                           name="playlist-description" id="playlist-description" wire:model="description"
                           class="flex w-full h-auto min-h-28 mt-2 px-3 pt-1.5 bg-transparent border text-gray-300 placeholder:text-neutral-400 sm:text-sm sm:leading-6 rounded-lg shadow-sm border-neutral-700 focus:border-primary-600 focus:ring-primary-600"
                           placeholder="Décrivez votre playlist..."></textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>
                    <fieldset>
                        <legend class="text-sm font-medium text-gray-300">Visibilité</legend>
                        <div class="mt-2 space-y-4">
                            <div class="relative flex items-start">
                                <div class="absolute flex h-6 items-center">
                                    <input id="public-visibility" name="visibility" type="radio" class="h-4 w-4 border-gray-300 text-primary-600 focus:ring-primary-600" value="1" wire:model="visibility">
                                </div>
                                <div class="pl-7 text-sm leading-6">
                                    <label for="public-visibility" class="font-medium text-gray-300">Publique</label>
                                    <p class="text-neutral-400">La playlist sera visible par tout le monde.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="absolute flex h-6 items-center">
                                    <input id="private-visibility" name="visibility" type="radio" class="h-4 w-4 border-gray-300 text-primary-600 focus:ring-primary-600" value="0" wire:model="visibility">
                                </div>
                                <div class="pl-7 text-sm leading-6">
                                    <label for="private-visibility" class="font-medium text-gray-300">Privé</label>
                                    <p class="text-neutral-400">La playlist sera visible uniquement par vous.</p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                {{--                                    <div class="pb-6 pt-4">--}}
                {{--                                        <div class="flex text-sm">--}}
                {{--                                            <a href="#" class="group inline-flex items-center font-medium text-indigo-600 hover:text-indigo-900">--}}
                {{--                                                <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
                {{--                                                    <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />--}}
                {{--                                                    <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />--}}
                {{--                                                </svg>--}}
                {{--                                                <span class="ml-2">Copy link</span>--}}
                {{--                                            </a>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="mt-4 flex text-sm">--}}
                {{--                                            <a href="#" class="group inline-flex items-center text-gray-500 hover:text-gray-900">--}}
                {{--                                                <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
                {{--                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />--}}
                {{--                                                </svg>--}}
                {{--                                                <span class="ml-2">Learn more about sharing</span>--}}
                {{--                                            </a>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
            </div>
        </div>
    </div>
    <div class="flex gap-3 flex-shrink-0 justify-end px-4 py-4">
        <button type="button" @click="playlistDrawer = false" class="inline-flex items-center justify-center rounded-md bg-background-accent hover:bg-background-accent-hover px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-background-accent-hover">Annuler</button>
        <x-button>Sauvegarder</x-button>
    </div>
</form>
