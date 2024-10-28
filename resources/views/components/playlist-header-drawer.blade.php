<div {{ $attributes->class(['bg-background-accent-hover px-4 py-6 sm:px-6']) }}>
    <div class="flex items-center justify-between">
        <h2 class="text-base font-semibold leading-6 text-white" id="slide-over-title">Playlist</h2>
        <div class="ml-3 flex h-7 items-center">
            <button type="button" @click="playlistDrawer = false"
                    class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-primary-600">
                <span class="absolute -inset-2.5"></span>
                <span class="sr-only">Close panel</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="mt-1">
        <p class="text-sm text-neutral-400">Créez une playlist dès maintenant ou ajoutez directement à une playlist
            existante !</p>
    </div>
</div>
