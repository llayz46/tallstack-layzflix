<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0" x-show="playlistDrawer"></div>

    <div class="fixed inset-0 overflow-hidden" x-show="playlistDrawer">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">

                <div class="pointer-events-auto w-screen max-w-md"
                     x-show="playlistDrawer" x-data="{ activeTab: 'AddPlaylist' }"
                     x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full" x-cloak>
                    <livewire:playlist.create />
                    <livewire:playlist.add :$media />
                </div>
            </div>
        </div>
    </div>
</div>
