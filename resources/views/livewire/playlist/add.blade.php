<form class="flex h-full flex-col divide-y divide-background-accent-hover bg-background-accent shadow-xl" method="POST" wire:submit.prevent="add" x-show="activeTab === 'AddPlaylist'">
    <div class="h-0 flex-1 overflow-y-auto">
        <x-playlist-header-drawer/>
        <div class="flex pt-1 gap-2 text-base font-medium leading-6 text-center">
            <button type="button" @click="activeTab = 'AddPlaylist'" class="w-1/2 pb-1 border-b-2" :class="activeTab === 'AddPlaylist' ? 'border-primary-600 text-white' : 'border-transparent text-neutral-400 hover:text-gray-300'">Ajouter à une playlist</button>
            <button type="button" @click="activeTab = 'CreatePlaylist'" class="w-1/2 pb-1 border-b-2" :class="activeTab === 'CreatePlaylist' ? 'border-primary-600 text-white' : 'border-transparent text-neutral-400 hover:text-gray-300'">Créer une playlist</button>
        </div>
        <div class="flex flex-1 flex-col justify-between">
            <div class="divide-y divide-background-accent-hover px-4 sm:px-6">
                <div class="pb-5 pt-6">
                    <x-label for="playlist-select">Ajouter à une de vos playlist</x-label>
                    <select id="playlist-select" wire:model="playlist" class="py-2 px-4 pe-9 mt-2 block w-full text-neutral-300 bg-background-accent border-neutral-700 rounded-md shadow-sm text-sm focus:border-primary-600 focus:ring-primary-600 disabled:opacity-50 disabled:pointer-events-none">
                        <option value="" disabled selected>Sélectionnez une playlist</option>

                        @foreach($playlists as $playlist)
                            <option value="{{ $playlist->id }}" wire:key="{{ $playlist->id }}">{{ $playlist->name }}</option>
                        @endforeach

                    </select>

                    @error('playlist') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="flex gap-3 flex-shrink-0 justify-end px-4 py-4">
        <button type="button" @click="playlistDrawer = false" class="inline-flex items-center justify-center rounded-md bg-background-accent hover:bg-background-accent-hover px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-background-accent-hover">Annuler</button>
        <x-button>Sauvegarder</x-button>
    </div>
</form>
