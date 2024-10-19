<div class="mx-auto max-w-3xl transform divide-y divide-border-normal overflow-hidden rounded-xl bg-background-accent shadow-2xl transition-all"
     @click.outside="followersModal = false" x-show="followersModal"
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
        <input type="text" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-300 placeholder:text-neutral-400 focus:ring-0 sm:text-sm" placeholder="Rechercher..." role="combobox" aria-expanded="false" aria-controls="options">
    </div>

    <div class="flex transform-gpu divide-x divide-border-normal">
        <!-- Preview Visible: "sm:h-96" -->
        <div class="max-h-96 min-w-0 flex-auto scroll-py-4 overflow-y-auto px-6 py-4 sm:h-96 no-scroll-bar">
            <!-- Default state, show/hide based on command palette state. -->
            <h2 class="mb-4 mt-2 text-xs font-semibold text-neutral-400">Vous suit :</h2>

            <!-- Results, show/hide based on command palette state. -->
            <ul class="-mx-2 text-sm text-neutral-400" role="list">
                @foreach($followers as $follower)
                    <li class="group flex cursor-default select-none items-center rounded-md p-2 @if($follower->id === $selectedUser->id) bg-background-accent-hover text-gray-300 @else hover:text-gray-300 hover:bg-background-accent-hover @endif" role="option" tabindex="-1" wire:click="selectUser({{ $follower }})">
                        <img src="{{ $follower->getProfilePhoto() }}" alt="Photo de profil de : {{ $follower->username }}" class="h-6 w-6 flex-none rounded-full">
                        <span class="ml-3 flex-auto truncate">{{ $follower->username }}</span>
                        <svg class="ml-3 @if($follower->id !== $selectedUser->id) hidden group-hover:block @endif h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </li>
                @endforeach
{{--                <li class="group flex cursor-default select-none items-center rounded-md p-2 text-gray-300 bg-background-accent-hover" role="option" tabindex="-1">--}}
{{--                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-6 w-6 flex-none rounded-full">--}}
{{--                    <span class="ml-3 flex-auto truncate">Tom Cook</span>--}}
{{--                    <svg class="ml-3 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />--}}
{{--                    </svg>--}}
{{--                </li>--}}
{{--                <li class="group flex cursor-default select-none items-center rounded-md p-2" role="option" tabindex="-1">--}}
{{--                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-6 w-6 flex-none rounded-full">--}}
{{--                    <span class="ml-3 flex-auto truncate">Courtney Henry</span>--}}
{{--                    <svg class="ml-3 hidden h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />--}}
{{--                    </svg>--}}
{{--                </li>--}}
                <div x-intersect.full="$wire.loadMore()">
                    <div class="sr-only" wire:loading>Loading more</div>
                </div>
            </ul>

        </div>

        <div class="hidden h-96 w-1/2 flex-none flex-col divide-y divide-border-normal overflow-y-auto sm:flex">
            <div class="flex-none p-6 text-center">
                <img src="{{ $selectedUser->getProfilePhoto() }}" alt="" class="mx-auto h-16 w-16 rounded-full">
                <h2 class="mt-3 font-semibold text-gray-300">{{ $selectedUser->username }}</h2>
                <p class="text-sm leading-6 text-neutral-400">{{ $selectedUser->biography }}</p>
            </div>
            <div class="flex flex-auto flex-col justify-between p-6">
                <dl class="grid grid-cols-1 gap-x-6 gap-y-3 text-sm text-neutral-400">
                    <dt class="col-end-1 font-semibold text-gray-300">Niveau</dt>
                    <dd>{{ $selectedUser->level }}</dd>
                    <dt class="col-end-1 font-semibold text-gray-300">Critiques</dt>
                    <dd>14</dd>
                    <dt class="col-end-1 font-semibold text-gray-300">Suivre en retour</dt>
                    @if(!auth()->user()->isFollowing($selectedUser))
                        <dd class="truncate text-primary-600 underline"><button wire:click="follow({{ $selectedUser->id }})">Follow</button></dd>
                    @else
                        <dd class="truncate text-primary-600 underline"><button wire:click="unfollow({{ $selectedUser->id }})">Unfollow</button></dd>
                    @endif
                </dl>
                <x-button class="cursor-not-allowed" disabled>Message</x-button>
            </div>
        </div>
    </div>

    <!-- Empty state, show/hide based on command palette state -->
    <div class="px-6 py-14 text-center text-sm sm:px-14">
        <svg class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
        <p class="mt-4 font-semibold text-gray-900">No people found</p>
        <p class="mt-2 text-gray-500">We couldn’t find anything with that term. Please try again.</p>
    </div>
</div>
