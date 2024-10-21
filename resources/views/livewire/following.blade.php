<div class="mx-auto max-w-3xl transform divide-y divide-border-normal overflow-hidden rounded-xl bg-background-accent shadow-2xl transition-all"
     x-data="{
         selectedUser: null,
         selectUser(following) {
             this.selectedUser = following;
         },
      }"
     @click.outside="followingsModal = false" x-show="followingsModal"
     x-transition:enter="ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95" x-cloak>
    <div class="relative">
        <svg class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-neutral-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
        </svg>
        <input type="text" wire:model.live.debounce.150ms="search" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-300 placeholder:text-neutral-400 focus:ring-0 sm:text-sm" placeholder="Rechercher..." role="combobox" aria-expanded="false" aria-controls="options">
    </div>

    <div class="flex transform-gpu divide-x divide-border-normal" x-data="{ image: null }">
        <div class="max-h-96 min-w-0 flex-auto scroll-py-4 overflow-y-auto px-6 py-4 sm:h-96 no-scroll-bar">
            <h2 class="mb-4 mt-2 text-xs font-semibold text-neutral-400">Vous suit :</h2>

            <ul class="-mx-2 text-sm text-neutral-400" role="list">
                @foreach($followings as $following)
                    <li class="group flex cursor-default select-none items-center rounded-md p-2"
                        :class="selectedUser?.id === {{ $following->id }} ? 'text-gray-300 bg-background-accent-hover' : 'hover:text-gray-300 hover:bg-background-accent-hover'"
                        role="option" tabindex="-1" wire:key="{{ $following->id }}"
                        @click="selectUser({ id: {{ $following->id }}, username: '{{ $following->username }}', biography: '{{ $following->biography }}', profile_photo_path: '{{ $following->getProfilePhoto() }}', slug: '{{ $following->slug }}' })">
                        <img src="{{ $following->getProfilePhoto() }}" alt="Photo de profil de : {{ $following->username }}" class="h-6 w-6 flex-none rounded-full object-cover">
                        <span class="ml-3 flex-auto truncate">{{ $following->username }}</span>
                        <svg class="ml-3 h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20"
                             :class="{ 'hidden group-hover:block': selectedUser?.id !== {{ $following->id }} }"
                             fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </li>
                @endforeach

                <div x-intersect.full="$wire.loadMore()">
                    <div class="h-8 w-full my-2 rounded-md bg-shimmer animate-shimmer bg-[length:200%_100%] transform-gpu" wire:loading></div>
                </div>
            </ul>
        </div>

        <div class="hidden h-96 w-1/2 flex-none flex-col overflow-y-auto sm:flex no-scroll-bar">
            <template x-if="selectedUser">
                <div class="h-full flex flex-col divide-y divide-border-normal">
                    <div class="flex-none p-6 text-center">
                        <img x-bind:src="selectedUser.profile_photo_path" alt="" class="mx-auto h-16 w-16 rounded-full object-cover">
                        <h2 class="mt-3 font-semibold text-gray-300" x-text="selectedUser.username"></h2>
                        <p class="text-sm leading-6 text-neutral-400" x-text="selectedUser.biography"></p>
                    </div>
                    <div class="flex flex-grow flex-col gap-6 justify-between p-6">
                        <dl class="grid grid-cols-1 gap-x-6 gap-y-3 text-sm text-neutral-400">
                            <dt class="col-end-1 font-semibold text-gray-300">Niveau</dt>
                            <dd x-text="selectedUser.level"></dd>
                            <dt class="col-end-1 font-semibold text-gray-300">Critiques</dt>
                            <dd>14</dd>
                            <dt>
                                <a :href="`/${selectedUser.slug}/profile`" class="text-primary-600 hover:underline">Voir le profil</a>
                            </dt>
                        </dl>
                        <x-button class="cursor-not-allowed" disabled>Message</x-button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
